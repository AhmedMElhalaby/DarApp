<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Models\Estate;
use App\Models\SavedSearch;
use App\Models\View;
use App\Traits\ResponseTrait;

class DestroyRequest extends ApiRequest
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
            'estate_id'=>'required|exists:estates,id',
        ];
    }

    public function persist()
    {
        $logged = auth()->user();
        $Estate = (new Estate())->find($this->estate_id);
        if($Estate->getUserId() == $logged->getId()){
            $Estate->delete();
            return $this->successJsonResponse([__('messages.deleted_successfully')]);
        }else{
            return  $this->failJsonResponse([__('messages.dont_have_permission')]);
        }
    }
}
