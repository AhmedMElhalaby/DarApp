<?php

namespace App\Http\Requests\Admin\UserManagement\Ticket;

use App\Helpers\Constant;
use App\Helpers\Functions;
use Illuminate\Foundation\Http\FormRequest;

class CloseRequest extends FormRequest
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
        ];
    }
    public function preset($crud,$id){
        $Object = $crud->getEntity()->find($id);
        if(!$Object)
            return $crud->wrongData();
        $Object->setStatus(Constant::TICKETS_STATUS['Closed']);
        $Object->save();
        if ($Object->user){
            Functions::SendNotification($Object->user,'Ticket Respond',' Your ticket has been respond !','الرد على التذكرة','لقد تم الرد على تذكرتك ! ',$Object->getId(),Constant::NOTIFICATION_TYPE['Ticket'],true);
        }
        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
