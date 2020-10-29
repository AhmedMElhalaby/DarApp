<?php

namespace App\Http\Controllers\Admin\AppManagement;

use App\Http\Controllers\Admin\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Traits\AhmedPanelTrait;

class RoleController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_managements/roles');
        $this->setEntity(new Role());
        $this->setTable('roles');
        $this->setLang('Role');
        $this->setColumns([
            'name'=> [
                'name'=>'name',
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
            'permissions'=> [
                'name'=>'permissions',
                'type'=>'multi_checkbox',
                'custom'=>[
                    'ListModel'=>[
                        'Model'=>(new Permission())->all(),
                        'name'=>'name',
                        'id'=>'id',
                    ],
                    'RelationModel'=>[
                        'Model'=>(new RolePermission()),
                        'ref_id'=>'permission_id',
                        'id'=>'role_id',
                    ],
                    'CheckFunc'=>function ($Object ,$id){
                        if($Object){
                            return $Object->hasPermission($id);
                        }
                        return false;
                    }
                ],
                'is_required'=>false,
            ],
        ]);
        $this->SetLinks([
            'edit',
//            'delete',
        ]);
    }

}
