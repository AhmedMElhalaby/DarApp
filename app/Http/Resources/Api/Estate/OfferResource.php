<?php

namespace App\Http\Resources\Api\Estate;

use App\Http\Resources\Api\Home\AreaResource;
use App\Http\Resources\Api\Home\CityResource;
use App\Http\Resources\Api\Home\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['Estate'] = new EstateResource($this->estate);
        $Objects['offer_price'] = $this->price;
        $Objects['expire_at'] = $this->expire_at;
        return $Objects;
    }
}
