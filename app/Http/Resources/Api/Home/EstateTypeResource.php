<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateTypeResource extends JsonResource
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
        $Objects['name'] = (app()->getLocale() == 'ar')?$this->getNameAr():$this->getName();
        $Objects['land_area'] = $this->land_area;
        $Objects['building_area'] = $this->building_area;
        $Objects['building_age'] = $this->building_age;
        $Objects['apartment_area'] = $this->apartment_area;
        $Objects['apartment_floor'] = $this->apartment_floor;
        $Objects['land_interface'] = $this->land_interface;
        $Objects['shop_length_area'] = $this->shop_length_area;
        $Objects['shop_width_area'] = $this->shop_width_area;
        $Objects['room_no'] = $this->room_no;
        $Objects['bathroom_no'] = $this->bathroom_no;
        $Objects['halls_no'] = $this->halls_no;
        $Objects['floors_no'] = $this->floors_no;
        $Objects['finishing_type'] = $this->finishing_type;
        $Objects['description'] = $this->description;
        $Objects['has_garage'] = $this->has_garage;
        $Objects['has_well'] = $this->has_well;
        $Objects['has_public_street_view'] = $this->has_public_street_view;
        $Objects['has_sea_view'] = $this->has_sea_view;
        $Objects['elementary_schools_no'] = $this->elementary_schools_no;
        $Objects['preparatory_schools_no'] = $this->preparatory_schools_no;
        $Objects['secondary_schools_no'] = $this->secondary_schools_no;
        $Objects['kindergarten_no'] = $this->kindergarten_no;
        $Objects['pharmacy_no'] = $this->pharmacy_no;
        $Objects['mosque_no'] = $this->mosque_no;
        $Objects['hospital_no'] = $this->hospital_no;
        $Objects['bakery_no'] = $this->bakery_no;
        $Objects['mall_no'] = $this->mall_no;
        $Objects['is_residential'] = $this->is_residential;
        $Objects['is_agricultural'] = $this->is_agricultural;
        $Objects['is_commercial'] = $this->is_commercial;
        $Objects['is_industrial'] = $this->is_industrial;
        return $Objects;
    }
}
