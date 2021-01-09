<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Models\Estate;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class IndexRequest extends ApiRequest
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
            'mine'=>'sometimes',
            'save'=>'sometimes',
            'room_no'=>'sometimes|integer',
            'city_id'=>'sometimes|exists:cities,id',
            'area_id'=>'sometimes|exists:areas,id',
        ];
    }

    public function persist()
    {
        $Objects = new Estate();
        $saved = false;
        if($this->mine && auth('api')->check()){
            $Objects = $Objects->where('user_id',auth('api')->user()->getId());
        }else{
            $Objects = $Objects->where('is_active',true);
        }
        if($this->save && auth('api')->check()){
            $SavedSearch = new SavedSearch();
            $SavedSearch->setUserId(auth('api')->user()->getId());
            $saved = true;
        }
        if($this->filled('city_id')){
            $Objects = $Objects->where('city_id',$this->city_id);
            if($saved){
                $SavedSearch->setCityId($this->city_id);
            }
        }
        if($this->filled('area_id')){
            $Objects = $Objects->where('area_id',$this->area_id);
            if($saved){
                $SavedSearch->setAreaId($this->area_id);
            }
        }
        if($this->filled('estate_type')){
            $Objects = $Objects->where('estate_type',$this->estate_type);
            if($saved){
                $SavedSearch->setEstateType($this->estate_type);
            }
        }
        if($this->filled('estate_offer_type')){
            $Objects = $Objects->where('estate_offer_type',$this->estate_offer_type);
            if($saved){
                $SavedSearch->setEstateOfferType($this->estate_offer_type);
            }
        }
        if($this->filled('room_no')){
            $Objects = $Objects->where('room_no',$this->room_no);
            if($saved){
                $SavedSearch->setRoomNo($this->room_no);
            }
        }
        if($this->filled('bathroom_no')){
            $Objects = $Objects->where('bathroom_no',$this->bathroom_no);
            if($saved){
                $SavedSearch->setBathroomNo($this->bathroom_no);
            }
        }
        if($this->filled('halls_no')){
            $Objects = $Objects->where('halls_no',$this->halls_no);
            if($saved){
                $SavedSearch->setHallsNo($this->halls_no);
            }
        }
        if($this->filled('estate_area')){
            $Objects = $Objects->where('estate_area',$this->estate_area);
            if($saved){
                $SavedSearch->setEstateArea($this->estate_area);
            }
        }
        if($this->filled('building_age')){
            $Objects = $Objects->where('building_age',$this->building_age);
            if($saved){
                $SavedSearch->setBuildingAge($this->building_age);
            }
        }
        if($this->filled('finishing_type')){
            $Objects = $Objects->where('finishing_type',$this->finishing_type);
            if($saved){
                $SavedSearch->setFinishingType($this->finishing_type);
            }
        }
        if($this->filled('elementary_schools_no')){
            $Objects = $Objects->where('elementary_schools_no',$this->elementary_schools_no);
            if($saved){
                $SavedSearch->setElementarySchoolsNo($this->elementary_schools_no);
            }
        }
        if($this->filled('preparatory_schools_no')){
            $Objects = $Objects->where('preparatory_schools_no',$this->preparatory_schools_no);
            if($saved){
                $SavedSearch->setPreparatorySchoolsNo($this->preparatory_schools_no);
            }
        }
        if($this->filled('secondary_schools_no')){
            $Objects = $Objects->where('secondary_schools_no',$this->secondary_schools_no);
            if($saved){
                $SavedSearch->setSecondarySchoolsNo($this->secondary_schools_no);
            }
        }
        if($this->filled('kindergarten_no')){
            $Objects = $Objects->where('kindergarten_no',$this->kindergarten_no);
            if($saved){
                $SavedSearch->setKindergartenNo($this->kindergarten_no);
            }
        }
        if($this->filled('has_sea_view')){
            $Objects = $Objects->where('has_sea_view',$this->has_sea_view);
            if($saved){
                $SavedSearch->setHasSeaView($this->has_sea_view);
            }
        }
        if($this->filled('has_well')){
            $Objects = $Objects->where('has_well',$this->has_well);
            if($saved){
                $SavedSearch->setHasWell($this->has_well);
            }
        }
        if($this->filled('has_public_street_view')){
            $Objects = $Objects->where('has_public_street_view',$this->has_public_street_view);
            if($saved){
                $SavedSearch->setHasPublicStreetView($this->has_public_street_view);
            }
        }
        if($this->filled('has_garage')){
            $Objects = $Objects->where('has_garage',$this->has_garage);
            if($saved){
                $SavedSearch->setHasGarage($this->has_garage);
            }
        }
        if($this->filled('is_payment_type_installment')){
            $Objects = $Objects->where('is_payment_type_installment',$this->is_payment_type_installment);
            if($saved){
                $SavedSearch->setIsPaymentTypeInstallment($this->is_payment_type_installment);
            }
        }
        if($this->filled('price_from') && $saved) {
            $SavedSearch->setPriceFrom($this->price_from);
        }
        if($this->filled('price_to') && $saved) {
            $SavedSearch->setPriceTo($this->price_to);
        }
        if($this->filled('price_from') && $this->filled('price_to')){
            $Objects = $Objects->whereBetween('price',[$this->price_from,$this->price_to]);
        }
        if($this->filled('price_from') && !$this->filled('price_to')){
            $Objects = $Objects->where('price','>',$this->price_from);
        }
        if(!$this->filled('price_from') && $this->filled('price_to')){
            $Objects = $Objects->where('price','<',$this->price_to);
        }
        if($saved){
            $SavedSearch->save();
        }
        $Objects = $Objects->paginate($this->per_page?:10);
        return $this->successJsonResponse([],EstateResource::collection($Objects->items()),'Estates',$Objects);
    }
}
