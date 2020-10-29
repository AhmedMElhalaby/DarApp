<?php

namespace App\Http\Resources\Api\Ticket;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $Objects = array();
        $Objects['id'] = $this->id;
        $Objects['response'] = $this->getResponse();
        $Objects['sender_type'] = $this->getSenderType();
        return $Objects;
    }
}
