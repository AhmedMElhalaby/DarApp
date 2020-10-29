<?php

namespace App\Http\Resources\Api\Ticket;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
        $Objects['title'] = $this->getTitle();
        $Objects['message'] = $this->getMessage();
        $Objects['attachment'] = $this->getAttachment();
        $Objects['status'] = $this->getStatus();
        $Objects['TicketResponses'] = TicketResponseResource::collection($this->ticket_responses);
        return $Objects;
    }
}
