<?php

namespace App\Http\Requests\Api\Notification;

use App\Http\Requests\Api\ApiRequest;
use App\Models\Notification;
use App\Traits\ResponseTrait;

class ReadAllRequest extends ApiRequest
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
        $Notification = Notification::where('user_id',auth()->user()->id)->where('read_at',null)->update(array('read_at'=>now()));
        return $this->successJsonResponse([__('messages.updated_successful')]);
    }
}
