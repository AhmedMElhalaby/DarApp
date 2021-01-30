<?php

namespace App\Http\Requests\Admin\AppContent\Estate;

use App\Helpers\Constant;
use App\Models\Estate;
use App\Models\Media;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class UpdateRequest extends FormRequest
{

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
            'estate_type'=>'required|exists:estate_types,id',
            'estate_offer_type'=>'required|in:'.Constant::ESTATE_OFFER_TYPE_RULES,
            'user_id'=>'required|exists:users,id',
            'city_id'=>'required|exists:cities,id',
            'area_id'=>'required|exists:areas,id',
            'street'=>'nullable|string|max:255',
            'estate_area'=>'required|numeric',
            'price'=>'required|numeric',
            'currency_id'=>'required|exists:currencies,id',
            'room_no'=>'sometimes',
            'bathroom_no'=>'sometimes',
            'halls_no'=>'sometimes',
            'floors_no'=>'sometimes',
            'finishing_type'=>'sometimes|in:'.Constant::FINISHING_TYPE_RULES,
            'description'=>'sometimes',
            'has_garage'=>'sometimes',
            'has_well'=>'sometimes',
            'has_public_street_view'=>'sometimes',
            'has_sea_view'=>'sometimes',
            'elementary_schools_no'=>'sometimes',
            'preparatory_schools_no'=>'sometimes',
            'secondary_schools_no'=>'sometimes',
            'kindergarten_no'=>'sometimes',
            'pharmacy_no'=>'sometimes',
            'mosque_no'=>'sometimes',
            'hospital_no'=>'sometimes',
            'bakery_no'=>'sometimes',
            'mall_no'=>'sometimes',
            'is_residential'=>'sometimes',
            'is_agricultural'=>'sometimes',
            'is_commercial'=>'sometimes',
            'is_industrial'=>'sometimes',
            'is_taboo'=>'sometimes',
            'has_attic'=>'sometimes',
            'is_payment_type_cash'=>'sometimes',
            'is_payment_type_installment'=>'sometimes',
            'is_payment_type_switching'=>'sometimes',
            'contact_name'=>'sometimes',
            'contact_identity'=>'sometimes',
            'contact_mobile1'=>'sometimes',
            'contact_mobile2'=>'sometimes',
            'lat'=>'required|string',
            'lng'=>'required|string',
            'estate_media'=>'sometimes|array',
            'estate_media.*'=>'sometimes|mimes:jpeg,jpg,png',
            'neighborhood_media'=>'sometimes|array',
            'neighborhood_media.*'=>'sometimes|mimes:jpeg,jpg,png',
        ];
    }

    public function preset($crud,$id)
    {
        $Object = (new Estate())->find($id);
        $Object->setEstateType($this->estate_type);
        $Object->setEstateOfferType($this->estate_offer_type);
        $Object->setCityId($this->city_id);
        $Object->setAreaId($this->area_id);
        $Object->setStreet(@$this->street);
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
            $Object->setHasGarage($this->has_garage == 'on');
        }
        if ($this->filled('has_well')) {
            $Object->setHasWell($this->has_well == 'on');
        }
        if ($this->filled('has_public_street_view')) {
            $Object->setHasPublicStreetView($this->has_public_street_view == 'on');
        }
        if ($this->filled('has_sea_view')) {
            $Object->setHasSeaView($this->has_sea_view == 'on');
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
            $Object->setPharmacyNo($this->pharmacy_no == 'on');
        }
        if ($this->filled('mosque_no')) {
            $Object->setMosqueNo($this->mosque_no == 'on');
        }
        if ($this->filled('hospital_no')) {
            $Object->setHospitalNo($this->hospital_no == 'on');
        }
        if ($this->filled('bakery_no')) {
            $Object->setBakeryNo($this->bakery_no == 'on');
        }
        if ($this->filled('mall_no')) {
            $Object->setMallNo($this->mall_no == 'on');
        }
        if ($this->filled('is_residential')) {
            $Object->setIsResidential($this->is_residential == 'on');
        }
        if ($this->filled('is_agricultural')) {
            $Object->setIsAgricultural($this->is_agricultural == 'on');
        }
        if ($this->filled('is_commercial')) {
            $Object->setIsCommercial($this->is_commercial == 'on');
        }
        if ($this->filled('is_industrial')) {
            $Object->setIsIndustrial($this->is_industrial == 'on');
        }
        if ($this->filled('is_taboo')) {
            $Object->setIsTaboo($this->is_taboo == 'on');
        }
        if ($this->filled('has_attic')) {
            $Object->setHasAttic($this->has_attic == 'on');
        }
        if ($this->filled('is_payment_type_cash')) {
            $Object->setIsPaymentTypeCash($this->is_payment_type_cash == 'on');
        }
        if ($this->filled('is_payment_type_installment')) {
            $Object->setIsPaymentTypeInstallment($this->is_payment_type_installment == 'on');
        }
        if ($this->filled('is_payment_type_switching')) {
            $Object->setIsPaymentTypeSwitching($this->is_payment_type_switching == 'on');
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
        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
