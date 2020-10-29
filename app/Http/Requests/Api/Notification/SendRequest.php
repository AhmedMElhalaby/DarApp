<?php

namespace App\Http\Requests\Api\Notification;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\NotificationResource;
use App\Models\Notification;
use App\Models\User;
use App\Traits\ResponseTrait;

class SendRequest extends ApiRequest
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
            'message'=>'required|string',
            'user_id'=>'required|exists:users,id'
        ];
    }

    public function persist()
    {
        $User = (new User())->find($this->user_id);
        $Logged = auth()->user();
        Functions::SendNotification($User,'You have new message',$this->message,'لديك رسالة جديدة',$this->message,$Logged->getId(),Constant::NOTIFICATION_TYPE['Chat'],false);
        return $this->successJsonResponse([__('messages.created_successful')]);
    }
}
