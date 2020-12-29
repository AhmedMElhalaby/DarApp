<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed estate_id
 * @property mixed price
 * @property mixed expire_at
 * @method Offer find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['estate_id','price','expire_at'];

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getExpireAt()
    {
        return $this->expire_at;
    }

    /**
     * @param mixed $expire_at
     */
    public function setExpireAt($expire_at): void
    {
        $this->expire_at = $expire_at;
    }

}
