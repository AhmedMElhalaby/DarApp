<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Http\Controllers\Admin\Controller;
use App\Models\Estate;
use App\Models\Offer;
use App\Traits\AhmedPanelTrait;

class OfferController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_content/offers');
        $this->setEntity(new Offer());
        $this->setTable('offers');
        $this->setLang('Offer');
        $this->setColumns([
            'estate_id'=> [
                'name'=>'estate_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Estate::all(),
                    'custom'=>function($Object){
                        return ($Object)?$Object->getCode().' - '.$Object->user->getName():' - ';
                    },
                    'entity'=>'estate'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'price'=> [
                'name'=>'price',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'expire_at'=> [
                'name'=>'expire_at',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'estate_id'=> [
                'name'=>'estate_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> Estate::all(),
                    'custom'=>function($Object){
                        return ($Object)?$Object->getCode().' - '.$Object->user->getName():' - ';
                    },
                    'entity'=>'estate'
                ],
                'is_required'=>true,
            ],
            'price'=> [
                'name'=>'price',
                'type'=>'text',
                'is_required'=>true
            ],
            'expire_at'=> [
                'name'=>'expire_at',
                'type'=>'date',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
