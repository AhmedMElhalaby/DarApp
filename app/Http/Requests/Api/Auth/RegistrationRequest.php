<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Traits\ResponseTrait;
use App\Models\User;

/**
 * @property mixed name
 * @property mixed password
 * @property mixed mobile
 * @property mixed email
 * @property mixed device_token
 * @property mixed device_type
 */
class RegistrationRequest extends ApiRequest
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
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'device_token' => 'string|required_with:device_type',
            'device_type' => 'string|required_with:device_token',
        ];
    }
    public function attributes()
    {
        return [];
    }
    public function persist()
    {
        $user = new User();
        $user->setName($this->name);
        $user->setPassword($this->password);
        $user->setMobile($this->mobile);
        $user->setEmail($this->email);
        $user->setLat(@$this->lat);
        $user->setLng(@$this->lng);
        if ($this->filled('device_token') && $this->filled('device_type')) {
            $user->setDeviceToken($this->device_token);
            $user->setDeviceType($this->device_type);
        }
        $user->save();
         $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $user->refresh();
        try {
            Functions::SendVerification($user);
        }catch (\Exception $e){

        }
        return $this->successJsonResponse( [__('messages.saved_successfully')],new UserResource($user,$tokenResult->accessToken),'User');

    }

}
