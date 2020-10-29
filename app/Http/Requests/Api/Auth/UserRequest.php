<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class UserRequest extends ApiRequest
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
            'name' => 'string|max:255,',
            'mobile' => 'numeric|min:6|unique:users,mobile,'. auth()->user()->id,
            'email' => 'email|unique:users,email,'. auth()->user()->id,
            'device_token' => 'string|required_with:device_type',
            'device_type' => 'string|required_with:device_token',
            'app_locale' => 'string|in:ar,en',

        ];
    }
    public function attributes()
    {
        return [];
    }
    public function persist()
    {
        $logged = auth()->user();
        if($this->hasFile('avatar')){
            $logged->setAvatar($this->file('avatar'));
        }
        if ($this->filled('name')){
            $logged->setName($this->name);
        }
        if ($this->filled('mobile')){
            if($this->mobile != $logged->getMobile()){
                $logged->setMobileVerifiedAt(null);
            }
            $logged->setMobile($this->mobile);
        }
        if ($this->filled('email')){
            if($this->email != $logged->getEmail()){
                $logged->setEmailVerifiedAt(null);
            }
            $logged->setEmail($this->email);
        }
        if ($this->filled('lat')){
            $logged->setLat($this->lat);
        }
        if ($this->filled('lng')){
            $logged->setLng($this->lng);
        }
        if ($this->filled('app_locale')){
            $logged->setAppLocale($this->app_locale);
        }
        if ($this->filled('device_token')&&$this->filled('device_type')){
            $logged->setDeviceToken($this->device_token);
            $logged->setDeviceType($this->device_type);
        }
        $logged->save();
        DB::table('oauth_access_tokens')->where('user_id', $logged->getId())->delete();
        $tokenResult = $logged->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return $this->successJsonResponse( [__('messages.updated_successful')],new UserResource($logged,$tokenResult->accessToken),'User');

    }
}
