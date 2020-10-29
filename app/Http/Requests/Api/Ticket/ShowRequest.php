<?php

namespace App\Http\Requests\Api\Ticket;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\Ticket;
use App\Traits\ResponseTrait;

class ShowRequest extends ApiRequest
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
            'ticket_id'=>'required|exists:tickets,id'
        ];
    }

    public function persist()
    {
        return $this->successJsonResponse([],new TicketResource((new  Ticket())->find($this->ticket_id)),'Ticket');
    }
}
