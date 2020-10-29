<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\PasswordReset;
use App\Traits\ResponseTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ResetPasswordRequest extends ApiRequest
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
            'user_id' => 'required|exists:users,id',
            'code' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function attributes()
    {
        return [];
    }
    public function persist()
    {
        $Object = (new User)->find($this->user_id);
        $passwordReset = PasswordReset::where('user_id',$Object->getId())->first();
        if($passwordReset->getCode() != $this->code){
            return $this->failJsonResponse( [__('auth.code_not_correct')]);
        }
        $Object->setPassword($this->password);
        $Object->save();
        DB::table('oauth_access_tokens')
            ->where('user_id', $Object->getId())
            ->delete();
        $tokenResult = $Object->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return $this->successJsonResponse( [__('messages.updated_successful')],new UserResource($Object,$tokenResult->accessToken),'User');
    }
}
