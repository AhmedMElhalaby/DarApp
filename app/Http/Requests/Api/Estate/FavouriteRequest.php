<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\Estate;
use App\Models\Favourite;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class FavouriteRequest extends ApiRequest
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
        $Estates = (new Favourite())->where('user_id',auth()->user()->getId())->pluck('estate_id');
        $Objects = new Estate();
        $Objects = $Objects->whereIn('id', $Estates);
        $Objects = $Objects->paginate($this->per_page?:10);
        return $this->successJsonResponse([],EstateResource::collection($Objects->items()),'Estates',$Objects);
    }
}
