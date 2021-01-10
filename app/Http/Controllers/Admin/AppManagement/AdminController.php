<?php

namespace App\Http\Controllers\Admin\AppManagement;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Models\Admin;
use App\Traits\AhmedPanelTrait;

class AdminController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_managements/admins');
        $this->setEntity(new Admin);
        $this->setTable('admins');
        $this->setLang('Admin');
        $this->setColumns([
            'avatar'=> [
                'name'=>'avatar',
                'type'=>'image',
                'is_searchable'=>false,
                'order'=>false
            ],
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'email'=> [
                'name'=>'email',
                'type'=>'email',
                'is_searchable'=>true,
                'order'=>true
            ],
            'type'=> [
                'name'=>'type',
                'type'=>'select',
                'data'=>[
                    Constant::ADMIN_TYPES['Admin'] =>__('crud.Admin.Types.'.Constant::ADMIN_TYPES['Admin'],[],session('my_locale')),
                    Constant::ADMIN_TYPES['Lawyer'] =>__('crud.Admin.Types.'.Constant::ADMIN_TYPES['Lawyer'],[],session('my_locale')),
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
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ],
            'email'=> [
                'name'=>'email',
                'type'=>'email',
                'is_required'=>true,
                'is_unique'=>true
            ],
            'password'=> [
                'name'=>'password',
                'type'=>'password',
                'confirmation'=>true,
                'editable'=>false,
                'is_required'=>true,
                'export'=>false
            ],
            'avatar'=> [
                'name'=>'avatar',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'type'=> [
                'name'=>'type',
                'type'=>'select',
                'data'=>[
                    Constant::ADMIN_TYPES['Admin'] =>__('crud.Admin.Types.'.Constant::ADMIN_TYPES['Admin'],[],session('my_locale')),
                    Constant::ADMIN_TYPES['Lawyer'] =>__('crud.Admin.Types.'.Constant::ADMIN_TYPES['Lawyer'],[],session('my_locale')),
                ],
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'active',
            'change_password',
            'delete',
        ]);
    }

}
