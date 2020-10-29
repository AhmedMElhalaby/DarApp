<?php

namespace App\Http\Requests\Api\Notification;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\NotificationResource;
use App\Models\Notification;
use App\Traits\ResponseTrait;

class ReadRequest extends ApiRequest
{
    use ResponseTrait;

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
            'notification_id'=>'required|exists:notifications,id',
        ];
    }

    public function persist()
    {
        $Notification = Notification::where('user_id',auth()->user()->id)->where('id',$this->notification_id)->first();
        if($Notification){
            $Notification->update(array('read_at'=>now()));
            return $this->successJsonResponse([__('messages.updated_successful')],new NotificationResource($Notification),'Notification');
        }
        return $this->failJsonResponse([__('messages.object_not_found')]);
    }
}
