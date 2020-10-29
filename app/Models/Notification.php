<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer user_id
 * @property string title
 * @property string message
 * @property string title_ar
 * @property string message_ar
 * @property integer|null ref_id
 * @property integer type
 * @property mixed read_at
 * @method Notification find(int $id)
 */
class Notification extends Model
{

    protected $table = 'notifications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id','title','message','title_ar','message_ar','ref_id','type','read_at'];

    public function user(){
        return $this->belongsTo(User::class);
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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTitleAr(): string
    {
        return $this->title_ar;
    }

    /**
     * @param string $title_ar
     */
    public function setTitleAr(string $title_ar): void
    {
        $this->title_ar = $title_ar;
    }

    /**
     * @return string
     */
    public function getMessageAr(): string
    {
        return $this->message_ar;
    }

    /**
     * @param string $message_ar
     */
    public function setMessageAr(string $message_ar): void
    {
        $this->message_ar = $message_ar;
    }

    /**
     * @return int|null
     */
    public function getRefId(): ?int
    {
        return $this->ref_id;
    }

    /**
     * @param int|null $ref_id
     */
    public function setRefId(?int $ref_id): void
    {
        $this->ref_id = $ref_id;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getReadAt()
    {
        return $this->read_at;
    }

    /**
     * @param mixed $read_at
     */
    public function setReadAt($read_at): void
    {
        $this->read_at = $read_at;
    }

}
