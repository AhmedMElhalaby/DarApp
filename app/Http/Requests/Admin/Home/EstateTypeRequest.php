<?php

namespace App\Http\Requests\Admin\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\EstateTypeResource;
use App\Http\Resources\Api\Home\FaqResource;
use App\Models\EstateType;
use App\Models\Faq;
use App\Traits\ResponseTrait;

class EstateTypeRequest extends ApiRequest
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
            'estate_type'=>'required|exists:estate_types,id'
        ];
    }

    public function persist()
    {
        $EstateType = (new EstateType())->find($this->estate_type);
        return $this->successJsonResponse([],new EstateTypeResource($EstateType),'EstateType');
    }
}
