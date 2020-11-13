<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed estate_id
 * @method Favourite find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Favourite extends Model
{
    protected $table = 'areas';
    protected $fillable = ['user_id','estate_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function estate(){
        return $this->belongsTo(Estate::class);
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getEstateId()
    {
        return $this->estate_id;
    }

    /**
     * @param mixed $estate_id
     */
    public function setEstateId($estate_id): void
    {
        $this->estate_id = $estate_id;
    }

}
