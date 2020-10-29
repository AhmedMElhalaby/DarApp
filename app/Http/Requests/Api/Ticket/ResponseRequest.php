<?php

namespace App\Http\Requests\Api\Ticket;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\Ticket;
use App\Models\TicketResponse;
use App\Traits\ResponseTrait;

class ResponseRequest extends ApiRequest
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
            'ticket_id'=>'required|exists:tickets,id',
            'response'=>'required|string',
        ];
    }

    public function persist()
    {
        $logged = auth()->user();
        $Ticket =(new  Ticket())->find($this->ticket_id);
        if($Ticket->getStatus() != Constant::TICKETS_STATUS['Open']){
            return $this->failJsonResponse([__('messages.wrong_data')]);
        }
        $Response = new TicketResponse();
        $Response->setTicketId($Ticket->getId());
        $Response->setResponse($this->response);
        $Response->setSenderType(Constant::SENDER_TYPE['User']);
        $Response->save();
        return $this->successJsonResponse([__('messages.saved_successfully')],new TicketResource($Ticket),'Ticket');
    }
}
