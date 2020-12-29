<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed estate_id
 * @property mixed user_id
 * @method View find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class View extends Model
{
    protected $table = 'views';
    protected $fillable = ['estate_id','user_id'];

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
}
