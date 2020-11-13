<?php

namespace App\Http\Resources\Api\Estate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SavedSearchResource extends JsonResource
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
        $Objects['user_id'] = $this->getUserId();
        $Objects['city_id'] = $this->getCityId();
        $Objects['area_id'] = $this->getAreaId();
        $Objects['estate_type'] = $this->getEstateType();
        $Objects['estate_offer_type'] = $this->getEstateOfferType();
        $Objects['room_no'] = $this->getRoomNo();
        $Objects['bathroom_no'] = $this->getBathroomNo();
        $Objects['halls_no'] = $this->getHallsNo();
        $Objects['estate_area'] = $this->getEstateArea();
        $Objects['building_age'] = $this->getBuildingAge();
        $Objects['finishing_type'] = $this->getFinishingType();
        $Objects['elementary_schools_no'] = $this->getElementarySchoolsNo();
        $Objects['preparatory_schools_no'] = $this->getPreparatorySchoolsNo();
        $Objects['secondary_schools_no'] = $this->getSecondarySchoolsNo();
        $Objects['kindergarten_no'] = $this->getKindergartenNo();
        $Objects['has_sea_view'] = $this->getHasSeaView();
        $Objects['has_well'] = $this->getHasWell();
        $Objects['has_public_street_view'] = $this->getHasPublicStreetView();
        $Objects['has_garage'] = $this->getHasGarage();
        $Objects['is_payment_type_installment'] = $this->getIsPaymentTypeInstallment();
        $Objects['price_from'] = $this->getPriceFrom();
        $Objects['price_to'] = $this->getPriceTo();
        return $Objects;
    }
}
