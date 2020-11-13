<?php

namespace App\Http\Resources\Api\Estate;

use App\Http\Resources\Api\Home\MediaResource;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
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
        $Objects['id'] = $this->id;
        $Objects['user_id'] = $this->getUserId();
        $Objects['estate_type'] = $this->getEstateType();
        $Objects['estate_offer_type'] = $this->getEstateOfferType();
        $Objects['city_id'] = $this->getCityId();
        $Objects['area_id'] = $this->getAreaId();
        $Objects['currency_id'] = $this->getCurrencyId();
        $Objects['street'] = $this->getStreet();
        $Objects['price'] = $this->getPrice();
        $Objects['estate_area'] = $this->getEstateArea();
        $Objects['land_area'] = $this->getLandArea();
        $Objects['building_area'] = $this->getBuildingArea();
        $Objects['building_age'] = $this->getBuildingAge();
        $Objects['room_no'] = $this->getRoomNo();
        $Objects['bathroom_no'] = $this->getBathroomNo();
        $Objects['halls_no'] = $this->getHallsNo();
        $Objects['floors_no'] = $this->getFloorsNo();
        $Objects['elementary_schools_no'] = $this->getElementarySchoolsNo();
        $Objects['preparatory_schools_no'] = $this->getPreparatorySchoolsNo();
        $Objects['secondary_schools_no'] = $this->getSecondarySchoolsNo();
        $Objects['kindergarten_no'] = $this->getKindergartenNo();
        $Objects['pharmacy_no'] = $this->getPharmacyNo();
        $Objects['mosque_no'] = $this->getMosqueNo();
        $Objects['hospital_no'] = $this->getHospitalNo();
        $Objects['bakery_no'] = $this->getBakeryNo();
        $Objects['mall_no'] = $this->getMallNo();
        $Objects['finishing_type'] = $this->getFinishingType();
        $Objects['description'] = $this->getDescription();
        $Objects['has_garage'] = $this->getHasGarage();
        $Objects['has_well'] = $this->getHasWell();
        $Objects['has_public_street_view'] = $this->getHasPublicStreetView();
        $Objects['has_sea_view'] = $this->getHasSeaView();
        $Objects['apartment_area'] = $this->getApartmentArea();
        $Objects['apartment_floor'] = $this->getApartmentFloor();
        $Objects['land_interface'] = $this->getLandInterface();
        $Objects['is_residential'] = $this->getIsResidential();
        $Objects['is_agricultural'] = $this->getIsAgricultural();
        $Objects['is_commercial'] = $this->getIsCommercial();
        $Objects['is_industrial'] = $this->getIsIndustrial();
        $Objects['is_taboo'] = $this->getIsTaboo();
        $Objects['is_payment_type_cash'] = $this->getIsPaymentTypeCash();
        $Objects['is_payment_type_installment'] = $this->getIsPaymentTypeInstallment();
        $Objects['is_payment_type_switching'] = $this->getIsPaymentTypeSwitching();
        $Objects['has_attic'] = $this->getHasAttic();
        $Objects['shop_length_area'] = $this->getShopLengthArea();
        $Objects['shop_width_area'] = $this->getShopWidthArea();
        $Objects['contact_name'] = $this->getContactName();
        $Objects['contact_identity'] = $this->getContactIdentity();
        $Objects['contact_mobile1'] = $this->getContactMobile1();
        $Objects['contact_mobile2'] = $this->getContactMobile2();
        $Objects['lat'] = $this->getLat();
        $Objects['lng'] = $this->getLng();
        $Objects['EstateMedia'] = MediaResource::collection($this->estate_media);
        $Objects['NeighborhoodMedia'] = MediaResource::collection($this->neighborhood_media);
        $Objects['status'] = $this->getStatus();
        $Objects['is_active'] = $this->isIsActive();
        $is_favourite = false;
        if(auth('api')->check()){
            $is_favourite = (Favourite::where('user_id',auth('api')->user()->getId())->where('estate_id',$this->getId())->first())?true:false;
        }
        $Objects['is_favourite'] = $is_favourite;
        return $Objects;
    }
}
