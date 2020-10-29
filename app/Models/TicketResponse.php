<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed ticket_id
 * @property mixed response
 * @property mixed sender_type
 * @method static find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class TicketResponse extends Model
{
    protected $table = 'ticket_responses';
    protected $fillable = ['ticket_id','response','sender_type'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTicketId()
    {
        return $this->ticket_id;
    }

    /**
     * @param mixed $ticket_id
     */
    public function setTicketId($ticket_id): void
    {
        $this->ticket_id = $ticket_id;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getSenderType()
    {
        return $this->sender_type;
    }

    /**
     * @param mixed $sender_type
     */
    public function setSenderType($sender_type): void
    {
        $this->sender_type = $sender_type;
    }

}
