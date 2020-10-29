<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\BankAccount;
use App\Traits\AhmedPanelTrait;

class BankAccountController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/app_data/bank_accounts');
        $this->setEntity(new BankAccount());
        $this->setTable('bank_accounts');
        $this->setLang('BankAccount');
        $this->setColumns([
            'bank_name'=> [
                'name'=>'bank_name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'account_name'=> [
                'name'=>'account_name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'account_number'=> [
                'name'=>'account_number',
                'type'=>'number',
                'is_searchable'=>true,
                'order'=>true
            ],
            'account_iban'=> [
                'name'=>'account_iban',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'bank_name'=> [
                'name'=>'bank_name',
                'type'=>'text',
                'is_required'=>true
            ],
            'account_name'=> [
                'name'=>'account_name',
                'type'=>'text',
                'is_required'=>true
            ],
            'account_number'=> [
                'name'=>'account_number',
                'type'=>'number',
                'is_required'=>true
            ],
            'account_iban'=> [
                'name'=>'account_iban',
                'type'=>'text',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
