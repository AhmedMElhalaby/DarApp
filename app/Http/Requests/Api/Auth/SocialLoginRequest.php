<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Helpers\Functions;
use App\Http\Resources\Api\User\UserResource;
use App\Models\SocialLogin;
use App\Traits\ResponseTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class SocialLoginRequest extends ApiRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provider' => 'required|in:'.Constant::SOCIAL_PROVIDER_RULES,
            'token' => 'required|string',
            'device_token' => 'string|required_with:device',
            'device_type' => 'string|required_with:device_token',
        ];
    }
    public function persist()
    {
        $Login = Functions::SocialLogin($this->provider,$this->token);
        if($Login == null)
            return $this->failJsonResponse([__('auth.failed')]);
        $SocialLogin = SocialLogin::where('provider',$this->provider)->where('provider_id',$Login['provider_id'])->first();
        if($SocialLogin == null){
            $ExistEmail = User::where('email',$Login['email'])->first();
            if($ExistEmail){
                SocialLogin::create(['provider'=>$this->provider,'provider_id'=>$Login['provider_id'],'user_id'=>$ExistEmail->getId()]);
                $user = $ExistEmail;
            }else{
                $user = new User();
                $user->setName($Login['name']);
                if($Login['email'] != null){
                    $user->setEmail($Login['email']);
                }else{
                    $user->setEmail($Login['provider_id'].'@'.Constant::SOCIAL_PROVIDER_TEXT[$this->provider].'.com');
                }
                $user->setPassword(\Str::random(16));
                $user->save();
                $user->refresh();
                SocialLogin::create(['provider'=>$this->provider,'provider_id'=>$Login['provider_id'],'user_id'=>$user->getId()]);
            }
        }else{
            $user = $SocialLogin->user;
        }
        DB::table('oauth_access_tokens')->where('user_id', $user->getId())->delete();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        if ($this->input('device_token')) {
            $user->device_token = $this->device_token;
            $user->device_type = $this->device_type;
            $user->save();
        }
        return $this->successJsonResponse( [__('auth.login')], new UserResource($user,$tokenResult->accessToken),'User');
    }
}
