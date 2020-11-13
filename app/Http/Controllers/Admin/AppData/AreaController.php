<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\Area;
use App\Models\City;
use App\Traits\AhmedPanelTrait;

class AreaController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_data/areas');
        $this->setEntity(new Area());
        $this->setTable('areas');
        $this->setLang('Area');
        $this->setColumns([
            'city_id'=> [
                'name'=>'city_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> City::all(),
                    'custom'=>function($Object){
                        return (session('my_locale') == 'en')?$Object->getName():$Object->getNameAr();
                    },
                    'entity'=>'city'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
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
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'city_id'=> [
                'name'=>'city_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> City::all(),
                    'custom'=>function($Object){
                        return (session('my_locale') == 'en')?$Object->getName():$Object->getNameAr();
                    },
                    'entity'=>'city'
                ],
                'is_required'=>true,
            ],
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
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
