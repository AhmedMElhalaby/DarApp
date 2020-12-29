<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\Estate;
use App\Models\Favourite;
use App\Models\Offer;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;
use Carbon\Carbon;

class SetOfferRequest extends ApiRequest
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
            'price'=>'required|numeric',
            'expire_at'=>'required|date'
        ];
    }

    public function persist()
    {
        $Estate = (new Estate())->find($this->estate_id);
        $Object = new Offer();
        $Object->setEstateId($Estate->getId());
        $Object->setPrice($this->price);
        $Object->setExpireAt(Carbon::parse($this->expire_at));
        $Object->save();
        return $this->successJsonResponse([],new EstateResource((new Estate())->find($this->estate_id)),'Estates');
    }
}
