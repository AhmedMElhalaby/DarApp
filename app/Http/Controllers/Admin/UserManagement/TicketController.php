<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\UserManagement\Ticket\CloseRequest;
use App\Http\Requests\Admin\UserManagement\Ticket\ResponseRequest;
use App\Models\Ticket;
use App\Models\User;
use App\Traits\AhmedPanelTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TicketController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('admin/user_managements/tickets');
        $this->setEntity(new Ticket());
        $this->setCreate(false);
        $this->setViewShow('Admin.UserManagement.Ticket.show');
        $this->setExport(false);
        $this->setTable('tickets');
        $this->setLang('Ticket');
        $this->setColumns([
            'id'=> [
                'name'=>'id',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'user_id'=> [
                'name'=>'user_id',
                'type'=>'custom_relation',
                'relation'=>[
                    'data'=> User::all(),
                    'custom'=>function($Object){
                        return $Object?$Object->name:'-';
                    },
                    'entity'=>'user'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'title'=> [
                'name'=>'title',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'status'=> [
                'name'=>'status',
                'type'=>'select',
                'data'=>[
                    Constant::TICKETS_STATUS['Open'] =>__('crud.Ticket.Statuses.'.Constant::TICKETS_STATUS['Open'],[],session('my_locale')),
                    Constant::TICKETS_STATUS['Closed'] =>__('crud.Ticket.Statuses.'.Constant::TICKETS_STATUS['Closed'],[],session('my_locale')),
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->SetLinks([
            'show',
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
    public function show($id)
    {
        $Object =$this->getEntity()->find($id);
        if(!$Object)
            return $this->wrongData();
        return view($this->getViewShow(),compact('Object'))->with($this->getParams());
    }

    /**
     * @param ResponseRequest $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function response(ResponseRequest $request, $id){
        return $request->preset($this,$id);
    }
    /**
     * @param CloseRequest $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function close(CloseRequest $request, $id){
        return $request->preset($this,$id);
    }
}
