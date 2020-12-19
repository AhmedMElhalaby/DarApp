<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed city_id
 * @property mixed area_id
 * @property mixed estate_type
 * @property mixed estate_offer_type
 * @property mixed room_no
 * @property mixed bathroom_no
 * @property mixed halls_no
 * @property mixed estate_area
 * @property mixed building_age
 * @property mixed finishing_type
 * @property mixed elementary_schools_no
 * @property mixed preparatory_schools_no
 * @property mixed secondary_schools_no
 * @property mixed kindergarten_no
 * @property mixed has_sea_view
 * @property mixed has_well
 * @property mixed has_public_street_view
 * @property mixed has_garage
 * @property mixed is_payment_type_installment
 * @property mixed price_from
 * @property mixed price_to
 * @method SavedSearch find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class SavedSearch extends Model
{
    protected $table = 'saved_searches';
    protected $fillable = ['user_id','city_id','area_id','estate_type','estate_offer_type','room_no','bathroom_no','halls_no','estate_area','building_age','finishing_type','elementary_schools_no','preparatory_schools_no','secondary_schools_no','kindergarten_no','has_sea_view','has_well','has_public_street_view','has_garage','is_payment_type_installment','price_from','price_to',];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
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
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * @param mixed $city_id
     */
    public function setCityId($city_id): void
    {
        $this->city_id = $city_id;
    }

    /**
     * @return mixed
     */
    public function getAreaId()
    {
        return $this->area_id;
    }

    /**
     * @param mixed $area_id
     */
    public function setAreaId($area_id): void
    {
        $this->area_id = $area_id;
    }

    /**
     * @return mixed
     */
    public function getEstateType()
    {
        return $this->estate_type;
    }

    /**
     * @param mixed $estate_type
     */
    public function setEstateType($estate_type): void
    {
        $this->estate_type = $estate_type;
    }

    /**
     * @return mixed
     */
    public function getEstateOfferType()
    {
        return $this->estate_offer_type;
    }

    /**
     * @param mixed $estate_offer_type
     */
    public function setEstateOfferType($estate_offer_type): void
    {
        $this->estate_offer_type = $estate_offer_type;
    }

    /**
     * @return mixed
     */
    public function getRoomNo()
    {
        return $this->room_no;
    }

    /**
     * @param mixed $room_no
     */
    public function setRoomNo($room_no): void
    {
        $this->room_no = $room_no;
    }

    /**
     * @return mixed
     */
    public function getBathroomNo()
    {
        return $this->bathroom_no;
    }

    /**
     * @param mixed $bathroom_no
     */
    public function setBathroomNo($bathroom_no): void
    {
        $this->bathroom_no = $bathroom_no;
    }

    /**
     * @return mixed
     */
    public function getHallsNo()
    {
        return $this->halls_no;
    }

    /**
     * @param mixed $halls_no
     */
    public function setHallsNo($halls_no): void
    {
        $this->halls_no = $halls_no;
    }

    /**
     * @return mixed
     */
    public function getEstateArea()
    {
        return $this->estate_area;
    }

    /**
     * @param mixed $estate_area
     */
    public function setEstateArea($estate_area): void
    {
        $this->estate_area = $estate_area;
    }

    /**
     * @return mixed
     */
    public function getBuildingAge()
    {
        return $this->building_age;
    }

    /**
     * @param mixed $building_age
     */
    public function setBuildingAge($building_age): void
    {
        $this->building_age = $building_age;
    }

    /**
     * @return mixed
     */
    public function getFinishingType()
    {
        return $this->finishing_type;
    }

    /**
     * @param mixed $finishing_type
     */
    public function setFinishingType($finishing_type): void
    {
        $this->finishing_type = $finishing_type;
    }

    /**
     * @return mixed
     */
    public function getElementarySchoolsNo()
    {
        return $this->elementary_schools_no;
    }

    /**
     * @param mixed $elementary_schools_no
     */
    public function setElementarySchoolsNo($elementary_schools_no): void
    {
        $this->elementary_schools_no = $elementary_schools_no;
    }

    /**
     * @return mixed
     */
    public function getPreparatorySchoolsNo()
    {
        return $this->preparatory_schools_no;
    }

    /**
     * @param mixed $preparatory_schools_no
     */
    public function setPreparatorySchoolsNo($preparatory_schools_no): void
    {
        $this->preparatory_schools_no = $preparatory_schools_no;
    }

    /**
     * @return mixed
     */
    public function getSecondarySchoolsNo()
    {
        return $this->secondary_schools_no;
    }

    /**
     * @param mixed $secondary_schools_no
     */
    public function setSecondarySchoolsNo($secondary_schools_no): void
    {
        $this->secondary_schools_no = $secondary_schools_no;
    }

    /**
     * @return mixed
     */
    public function getKindergartenNo()
    {
        return $this->kindergarten_no;
    }

    /**
     * @param mixed $kindergarten_no
     */
    public function setKindergartenNo($kindergarten_no): void
    {
        $this->kindergarten_no = $kindergarten_no;
    }

    /**
     * @return mixed
     */
    public function getHasSeaView()
    {
        return $this->has_sea_view;
    }

    /**
     * @param mixed $has_sea_view
     */
    public function setHasSeaView($has_sea_view): void
    {
        $this->has_sea_view = $has_sea_view;
    }

    /**
     * @return mixed
     */
    public function getHasWell()
    {
        return $this->has_well;
    }

    /**
     * @param mixed $has_well
     */
    public function setHasWell($has_well): void
    {
        $this->has_well = $has_well;
    }

    /**
     * @return mixed
     */
    public function getHasPublicStreetView()
    {
        return $this->has_public_street_view;
    }

    /**
     * @param mixed $has_public_street_view
     */
    public function setHasPublicStreetView($has_public_street_view): void
    {
        $this->has_public_street_view = $has_public_street_view;
    }

    /**
     * @return mixed
     */
    public function getHasGarage()
    {
        return $this->has_garage;
    }

    /**
     * @param mixed $has_garage
     */
    public function setHasGarage($has_garage): void
    {
        $this->has_garage = $has_garage;
    }

    /**
     * @return mixed
     */
    public function getIsPaymentTypeInstallment()
    {
        return $this->is_payment_type_installment;
    }

    /**
     * @param mixed $is_payment_type_installment
     */
    public function setIsPaymentTypeInstallment($is_payment_type_installment): void
    {
        $this->is_payment_type_installment = $is_payment_type_installment;
    }

    /**
     * @return mixed
     */
    public function getPriceFrom()
    {
        return $this->price_from;
    }

    /**
     * @param mixed $price_from
     */
    public function setPriceFrom($price_from): void
    {
        $this->price_from = $price_from;
    }

    /**
     * @return mixed
     */
    public function getPriceTo()
    {
        return $this->price_to;
    }

    /**
     * @param mixed $price_to
     */
    public function setPriceTo($price_to): void
    {
        $this->price_to = $price_to;
    }
}
