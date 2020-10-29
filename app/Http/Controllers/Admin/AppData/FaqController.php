<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\Faq;
use App\Models\Setting;
use App\Traits\AhmedPanelTrait;

class FaqController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_data/faqs');
        $this->setEntity(new Faq());
        $this->setTable('faqs');
        $this->setLang('Faq');
        $this->setColumns([
            'question'=> [
                'name'=>'question',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'question_ar'=> [
                'name'=>'question_ar',
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
            'question'=> [
                'name'=>'question',
                'type'=>'text',
                'is_required'=>true
            ],
            'question_ar'=> [
                'name'=>'question_ar',
                'type'=>'text',
                'is_required'=>true
            ],
            'answer'=> [
                'name'=>'answer',
                'type'=>'textarea',
                'is_required'=>true
            ],
            'answer_ar'=> [
                'name'=>'answer_ar',
                'type'=>'textarea',
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
