<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Http\Resources\Api\Estate\OfferResource;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\Estate;
use App\Models\Favourite;
use App\Models\Offer;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;
use Carbon\Carbon;

class MyOfferRequest extends ApiRequest
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
        $logged = auth()->user();
        $Estates = (new Estate())->where('user_id',$logged->getId())->pluck('id');
        $Objects = (new Offer())->whereIn('estate_id',$Estates)->paginate(10);
        return $this->successJsonResponse([],OfferResource::collection($Objects->items()),'Offers',$Objects);
    }
}
