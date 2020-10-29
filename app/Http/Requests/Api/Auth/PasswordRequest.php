<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;

class PasswordRequest extends ApiRequest
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
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function attributes()
    {
        return [];
    }
    public function persist()
    {
        $logged = $this->user();
        if(Hash::check($this->old_password,$logged->password)){
            $logged->setPassword($this->password);
            $logged->save();
            $logged->token()->revoke();
            $logged->token()->delete();
            $tokenResult = $logged->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->save();
            return $this->successJsonResponse([__('messages.updated_successful')],new UserResource($logged,$tokenResult->accessToken),'User');
        }
        return $this->failJsonResponse([__('auth.password_not_correct')]);
    }
}
