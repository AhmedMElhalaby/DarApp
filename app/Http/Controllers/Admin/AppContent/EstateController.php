<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AppContent\Estate\StoreRequest;
use App\Http\Requests\Admin\AppContent\Estate\UpdateRequest;
use App\Models\City;
use App\Models\Estate;
use App\Models\EstateType;
use App\Models\User;
use App\Traits\AhmedPanelTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class EstateController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_content/estates');
        $this->setEntity(new Estate());
        $this->setTable('estates');
        $this->setLang('Estate');
        $this->setViewCreate('Admin.AppContent.Estate.create');
        $this->setViewEdit('Admin.AppContent.Estate.edit');
        $this->setColumns([
            'user_id'=> [
                'name'=>'user_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> User::all(),
                    'custom'=>function($Object){
                        return $Object->getName();
                    },
                    'entity'=>'user'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
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
            'estate_type'=> [
                'name'=>'estate_type',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> EstateType::all(),
                    'custom'=>function($Object){
                        return (session('my_locale') == 'en')?$Object->getName():$Object->getNameAr();
                    },
                    'entity'=>'estate_type_rel'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'estate_offer_type'=> [
                'name'=>'estate_offer_type',
                'type'=>'select',
                'data'=>[
                    Constant::ESTATE_OFFER_TYPE['Selling'] =>__('crud.Estate.EstateOfferTypes.'.Constant::ESTATE_OFFER_TYPE['Selling'],[],session('my_locale')),
                    Constant::ESTATE_OFFER_TYPE['Renting'] =>__('crud.Estate.EstateOfferTypes.'.Constant::ESTATE_OFFER_TYPE['Renting'],[],session('my_locale')),
                    Constant::ESTATE_OFFER_TYPE['Switching'] =>__('crud.Estate.EstateOfferTypes.'.Constant::ESTATE_OFFER_TYPE['Switching'],[],session('my_locale')),
                ],
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
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @return Redirector|RedirectResponse|Application
     */
    public function store(StoreRequest $request)
    {
        return $request->preset($this);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateRequest $request
     * @param $id
     * @return Redirector|RedirectResponse|Application
     */
    public function update(UpdateRequest $request,$id)
    {
        return $request->preset($this,$id);
    }
}
