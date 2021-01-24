<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\EstateType;
use App\Traits\AhmedPanelTrait;

class EstateTypeController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_data/estate_types');
        $this->setEntity(new EstateType());
        $this->setTable('estate_types');
        $this->setLang('EstateType');
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ],
            'name_ar'=> [
                'name'=>'name_ar',
                'type'=>'text',
                'is_required'=>true
            ],
            'land_area'=> ['name'=>'land_area','type'=>'checkbox','is_required'=>false],
            'building_area'=> ['name'=>'building_area','type'=>'checkbox','is_required'=>false],
            'building_age'=> ['name'=>'building_age','type'=>'checkbox','is_required'=>false],
            'apartment_area'=> ['name'=>'apartment_area','type'=>'checkbox','is_required'=>false],
            'apartment_floor'=> ['name'=>'apartment_floor','type'=>'checkbox','is_required'=>false],
            'land_interface'=> ['name'=>'land_interface','type'=>'checkbox','is_required'=>false],
            'shop_length_area'=> ['name'=>'shop_length_area','type'=>'checkbox','is_required'=>false],
            'shop_width_area'=> ['name'=>'shop_width_area','type'=>'checkbox','is_required'=>false],
            'room_no'=> ['name'=>'room_no','type'=>'checkbox','is_required'=>false],
            'bathroom_no'=> ['name'=>'bathroom_no','type'=>'checkbox','is_required'=>false],
            'halls_no'=> ['name'=>'halls_no','type'=>'checkbox','is_required'=>false],
            'floors_no'=> ['name'=>'floors_no','type'=>'checkbox','is_required'=>false],
            'finishing_type'=> ['name'=>'finishing_type','type'=>'checkbox','is_required'=>false],
            'description'=> ['name'=>'description','type'=>'checkbox','is_required'=>false],
            'has_garage'=> ['name'=>'has_garage','type'=>'checkbox','is_required'=>false],
            'has_well'=> ['name'=>'has_well','type'=>'checkbox','is_required'=>false],
            'has_public_street_view'=> ['name'=>'has_public_street_view','type'=>'checkbox','is_required'=>false],
            'has_sea_view'=> ['name'=>'has_sea_view','type'=>'checkbox','is_required'=>false],
            'elementary_schools_no'=> ['name'=>'elementary_schools_no','type'=>'checkbox','is_required'=>false],
            'preparatory_schools_no'=> ['name'=>'preparatory_schools_no','type'=>'checkbox','is_required'=>false],
            'secondary_schools_no'=> ['name'=>'secondary_schools_no','type'=>'checkbox','is_required'=>false],
            'kindergarten_no'=> ['name'=>'kindergarten_no','type'=>'checkbox','is_required'=>false],
            'pharmacy_no'=> ['name'=>'pharmacy_no','type'=>'checkbox','is_required'=>false],
            'mosque_no'=> ['name'=>'mosque_no','type'=>'checkbox','is_required'=>false],
            'hospital_no'=> ['name'=>'hospital_no','type'=>'checkbox','is_required'=>false],
            'bakery_no'=> ['name'=>'bakery_no','type'=>'checkbox','is_required'=>false],
            'mall_no'=> ['name'=>'mall_no','type'=>'checkbox','is_required'=>false],
            'is_residential'=> ['name'=>'is_residential','type'=>'checkbox','is_required'=>false],
            'is_agricultural'=> ['name'=>'is_agricultural','type'=>'checkbox','is_required'=>false],
            'is_commercial'=> ['name'=>'is_commercial','type'=>'checkbox','is_required'=>false],
            'is_industrial'=> ['name'=>'is_industrial','type'=>'checkbox','is_required'=>false],
            'is_taboo'=> ['name'=>'is_taboo','type'=>'checkbox','is_required'=>false],
            'has_attic'=> ['name'=>'has_attic','type'=>'checkbox','is_required'=>false],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
