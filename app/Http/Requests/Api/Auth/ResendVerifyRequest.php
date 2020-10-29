<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Traits\ResponseTrait;

class ResendVerifyRequest extends ApiRequest
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
            'type'=>'required|in:'.Constant::VERIFICATION_TYPE_RULES
        ];
    }
    public function attributes()
    {
        return [];
    }
    public function persist()
    {
        Functions::SendVerification(auth('api')->user(),$this->type);
        return $this->successJsonResponse( [__('auth.verification_code_sent')]);
    }
}
