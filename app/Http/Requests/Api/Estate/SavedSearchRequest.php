<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class SavedSearchRequest extends ApiRequest
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
        ];
    }

    public function persist()
    {
        $Objects = new SavedSearch();
        $Objects = $Objects->where('user_id',auth()->user()->getId());
        $Objects = $Objects->paginate($this->per_page?:10);
        return $this->successJsonResponse([],SavedSearchResource::collection($Objects->items()),'SavedSearches',$Objects);
    }
}
