<?php

namespace App\Http\Requests\Api\Ticket;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\Ticket;
use App\Traits\ResponseTrait;

class StoreRequest extends ApiRequest
{
    use ResponseTrait;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lawyer_id'=>'required|exists:admins,id',
            'title'=>'required|string',
            'message'=>'required',
            'attachment'=>'sometimes|mimes:jpeg,jpg,png'
        ];
    }

    public function persist()
    {
        $logged = auth()->user();
        $Ticket =new  Ticket();
        $Ticket->setUserId($logged->getId());
        $Ticket->setTitle($this->title);
        $Ticket->setLawyerId($this->lawyer_id);
        $Ticket->setMessage($this->message);
        if($this->hasFile('attachment')) {
            $Ticket->setAttachment($this->file('attachment'));
        }
        $Ticket->save();
        return $this->successJsonResponse([__('messages.saved_successfully')],new TicketResource($Ticket),'Ticket');
    }
}
