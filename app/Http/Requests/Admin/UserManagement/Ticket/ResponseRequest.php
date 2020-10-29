<?php

namespace App\Http\Requests\Admin\UserManagement\Ticket;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Models\TicketResponse;
use Illuminate\Foundation\Http\FormRequest;

class ResponseRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ticket_response'=>'required|string'
        ];
    }
    public function preset($crud,$id){
        $Object = $crud->getEntity()->find($id);
        if(!$Object)
            return $crud->wrongData();

        if($Object->getStatus() != Constant::TICKETS_STATUS['Open']){
            return $crud->wrongData();
        }
        $Response = new TicketResponse();
        $Response->setTicketId($Object->getId());
        $Response->setResponse($this->ticket_response);
        $Response->setSenderType(Constant::SENDER_TYPE['Admin']);
        $Response->save();
        Functions::SendNotification($Object->user,'Ticket Respond',' Your ticket has been respond !','الرد على التذكرة','لقد تم الرد على تذكرتك ! ',$Object->getId(),Constant::NOTIFICATION_TYPE['Ticket'],true);
        return redirect()->back()->with('status', __('admin.messages.saved_successfully'));
    }
}
