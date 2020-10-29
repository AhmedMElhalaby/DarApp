<?php

namespace App\Http\Requests\Api\Notification;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\NotificationResource;
use App\Models\Notification;
use App\Traits\ResponseTrait;

class SearchRequest extends ApiRequest
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
        ];
    }

    public function persist()
    {
        $Notifications = Notification::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate($this->per_page?:10);
        return $this->successJsonResponse([],NotificationResource::collection($Notifications->items()),'Notifications',$Notifications);
    }
}
