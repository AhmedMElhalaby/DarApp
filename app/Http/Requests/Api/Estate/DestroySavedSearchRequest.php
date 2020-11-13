<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class DestroySavedSearchRequest extends ApiRequest
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
            'saved_search_id'=>'required|exists:saved_searches,id'
        ];
    }

    public function persist()
    {
        $Object = (new SavedSearch())->find($this->saved_search_id);
        $Object->delete();
        return $this->successJsonResponse([__('messages.deleted_successfully')]);
    }
}
