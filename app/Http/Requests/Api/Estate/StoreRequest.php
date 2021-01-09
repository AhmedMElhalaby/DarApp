<?php

namespace App\Http\Requests\Api\Estate;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Models\Estate;
use App\Models\Media;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class StoreRequest extends ApiRequest
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
            'estate_type'=>'required|in:'.Constant::ESTATE_TYPE_RULES,
            'estate_offer_type'=>'required|in:'.Constant::ESTATE_OFFER_TYPE_RULES,
            'city_id'=>'required|exists:cities,id',
            'area_id'=>'required|exists:areas,id',
            'street'=>'required|string|max:255',
            'estate_area'=>'required|numeric',
            'price'=>'required|numeric',
            'currency_id'=>'required|exists:currencies,id',
            'land_area'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['House'].'|numeric',
            'building_area'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['House'].'|numeric',
            'building_age'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['House'].'|required_if:estate_type,'.Constant::ESTATE_TYPE['Apartment'].'|numeric',
            'apartment_area'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['Apartment'].'|numeric',
            'apartment_floor'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['Apartment'].'|numeric',
            'land_interface'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['Land'].'|numeric',
            'shop_length_area'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['Shop'].'|numeric',
            'shop_width_area'=>'required_if:estate_type,'.Constant::ESTATE_TYPE['Shop'].'|numeric',
            'room_no'=>'sometimes',
            'bathroom_no'=>'sometimes|numeric',
            'halls_no'=>'sometimes|numeric',
            'floors_no'=>'sometimes|numeric',
            'finishing_type'=>'sometimes|in:'.Constant::FINISHING_TYPE_RULES,
            'description'=>'sometimes|string|max:255',
            'has_garage'=>'sometimes|boolean',
            'has_well'=>'sometimes|boolean',
            'has_public_street_view'=>'sometimes|boolean',
            'has_sea_view'=>'sometimes|boolean',
            'elementary_schools_no'=>'sometimes|numeric',
            'preparatory_schools_no'=>'sometimes|numeric',
            'secondary_schools_no'=>'sometimes|numeric',
            'kindergarten_no'=>'sometimes|numeric',
            'pharmacy_no'=>'sometimes|boolean',
            'mosque_no'=>'sometimes|boolean',
            'hospital_no'=>'sometimes|boolean',
            'bakery_no'=>'sometimes|boolean',
            'mall_no'=>'sometimes|boolean',
            'is_residential'=>'sometimes|boolean',
            'is_agricultural'=>'sometimes|boolean',
            'is_commercial'=>'sometimes|boolean',
            'is_industrial'=>'sometimes|boolean',
            'is_taboo'=>'sometimes|boolean',
            'has_attic'=>'sometimes|boolean',
            'is_payment_type_cash'=>'sometimes|boolean',
            'is_payment_type_installment'=>'sometimes|boolean',
            'is_payment_type_switching'=>'sometimes|boolean',
            'contact_name'=>'sometimes|string',
            'contact_identity'=>'sometimes|string',
            'contact_mobile1'=>'sometimes|string',
            'contact_mobile2'=>'sometimes|string',
            'lat'=>'required|string',
            'lng'=>'required|string',
            'estate_media'=>'required|array',
            'estate_media.*'=>'required|mimes:jpeg,jpg,png',
            'neighborhood_media'=>'required|array',
            'neighborhood_media.*'=>'required|mimes:jpeg,jpg,png',


        ];
    }

    public function persist()
    {
        $Object = new Estate();
        $Object->setUserId(auth()->user()->getId());
        $Object->setEstateType($this->estate_type);
        $Object->setEstateOfferType($this->estate_offer_type);
        $Object->setCityId($this->city_id);
        $Object->setAreaId($this->area_id);
        $Object->setStreet($this->street);
        $Object->setEstateArea($this->estate_area);
        $Object->setPrice($this->price);
        $Object->setCurrencyId($this->currency_id);
        if ($this->filled('land_area')) {
            $Object->setLandArea($this->land_area);
        }
        if ($this->filled('building_area')) {
            $Object->setBuildingArea($this->building_area);
        }
        if ($this->filled('building_age')) {
            $Object->setBuildingAge($this->building_age);
        }
        if ($this->filled('apartment_area')) {
            $Object->setApartmentArea($this->apartment_area);
        }
        if ($this->filled('apartment_floor')) {
            $Object->setApartmentFloor($this->apartment_floor);
        }
        if ($this->filled('land_interface')) {
            $Object->setLandInterface($this->land_interface);
        }
        if ($this->filled('shop_length_area')) {
            $Object->setShopLengthArea($this->shop_length_area);
        }
        if ($this->filled('shop_width_area')) {
            $Object->setShopWidthArea($this->shop_width_area);
        }
        if ($this->filled('room_no')) {
            $Object->setRoomNo($this->room_no);
        }
        if ($this->filled('bathroom_no')) {
            $Object->setBathroomNo($this->bathroom_no);
        }
        if ($this->filled('halls_no')) {
            $Object->setHallsNo($this->halls_no);
        }
        if ($this->filled('floors_no')) {
            $Object->setFloorsNo($this->floors_no);
        }
        if ($this->filled('finishing_type')) {
            $Object->setFinishingType($this->finishing_type);
        }
        if ($this->filled('description')) {
            $Object->setDescription($this->description);
        }
        if ($this->filled('has_garage')) {
            $Object->setHasGarage($this->has_garage);
        }
        if ($this->filled('has_well')) {
            $Object->setHasWell($this->has_well);
        }
        if ($this->filled('has_public_street_view')) {
            $Object->setHasPublicStreetView($this->has_public_street_view);
        }
        if ($this->filled('has_sea_view')) {
            $Object->setHasSeaView($this->has_sea_view);
        }
        if ($this->filled('elementary_schools_no')) {
            $Object->setElementarySchoolsNo($this->elementary_schools_no);
        }
        if ($this->filled('preparatory_schools_no')) {
            $Object->setPreparatorySchoolsNo($this->preparatory_schools_no);
        }
        if ($this->filled('secondary_schools_no')) {
            $Object->setSecondarySchoolsNo($this->secondary_schools_no);
        }
        if ($this->filled('kindergarten_no')) {
            $Object->setKindergartenNo($this->kindergarten_no);
        }
        if ($this->filled('pharmacy_no')) {
            $Object->setPharmacyNo($this->pharmacy_no);
        }
        if ($this->filled('mosque_no')) {
            $Object->setMosqueNo($this->mosque_no);
        }
        if ($this->filled('hospital_no')) {
            $Object->setHospitalNo($this->hospital_no);
        }
        if ($this->filled('bakery_no')) {
            $Object->setBakeryNo($this->bakery_no);
        }
        if ($this->filled('mall_no')) {
            $Object->setMallNo($this->mall_no);
        }
        if ($this->filled('is_residential')) {
            $Object->setIsResidential($this->is_residential);
        }
        if ($this->filled('is_agricultural')) {
            $Object->setIsAgricultural($this->is_agricultural);
        }
        if ($this->filled('is_commercial')) {
            $Object->setIsCommercial($this->is_commercial);
        }
        if ($this->filled('is_industrial')) {
            $Object->setIsIndustrial($this->is_industrial);
        }
        if ($this->filled('is_taboo')) {
            $Object->setIsTaboo($this->is_taboo);
        }
        if ($this->filled('has_attic')) {
            $Object->setHasAttic($this->has_attic);
        }
        if ($this->filled('is_payment_type_cash')) {
            $Object->setIsPaymentTypeCash($this->is_payment_type_cash);
        }
        if ($this->filled('is_payment_type_installment')) {
            $Object->setIsPaymentTypeInstallment($this->is_payment_type_installment);
        }
        if ($this->filled('is_payment_type_switching')) {
            $Object->setIsPaymentTypeSwitching($this->is_payment_type_switching);
        }
        if ($this->filled('contact_name')) {
            $Object->setContactName($this->contact_name);
        }
        if ($this->filled('contact_identity')) {
            $Object->setContactIdentity($this->contact_identity);
        }
        if ($this->filled('contact_mobile1')) {
            $Object->setContactMobile1($this->contact_mobile1);
        }
        if ($this->filled('contact_mobile2')) {
            $Object->setContactMobile2($this->contact_mobile2);
        }
        $Object->setLat($this->lat);
        $Object->setLng($this->lng);
        $Object->save();
        $Object->refresh();
        if ($this->hasFile('estate_media')){
            foreach ($this->file('estate_media') as $media){
                $Media = new Media();
                $Media->setRefId($Object->getId());
                $Media->setFile($media);
                $Media->setMediaType(Constant::MEDIA_TYPES['Estate Media']);
                $Media->save();
            }
        }
        if ($this->hasFile('neighborhood_media')){
            foreach ($this->file('neighborhood_media') as $media){
                $Media = new Media();
                $Media->setRefId($Object->getId());
                $Media->setFile($media);
                $Media->setMediaType(Constant::MEDIA_TYPES['Estate Neighborhood Media']);
                $Media->save();
            }
        }
        return $this->successJsonResponse([__('messages.saved_successfully')],new EstateResource($Object),'Estate');
    }
}
