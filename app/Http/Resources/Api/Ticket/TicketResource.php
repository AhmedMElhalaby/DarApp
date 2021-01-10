<?php

namespace App\Http\Resources\Api\Ticket;

use App\Http\Resources\Api\Home\LawyerResource;
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
        $Objects['lawyer_id'] = $this->getLawyerId();
        $Objects['Lawyer'] = new LawyerResource($this->lawyer);
        $Objects['title'] = $this->getTitle();
        $Objects['message'] = $this->getMessage();
        $Objects['attachment'] = $this->getAttachment();
        $Objects['status'] = $this->getStatus();
        $Objects['TicketResponses'] = TicketResponseResource::collection($this->ticket_responses);
        return $Objects;
    }
}
