<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed name
 * @property mixed name_ar
 * @property mixed land_area
 * @property mixed building_area
 * @property mixed building_age
 * @property mixed apartment_area
 * @property mixed apartment_floor
 * @property mixed land_interface
 * @property mixed shop_length_area
 * @property mixed shop_width_area
 * @property mixed room_no
 * @property mixed bathroom_no
 * @property mixed halls_no
 * @property mixed floors_no
 * @property mixed finishing_type
 * @property mixed description
 * @property mixed has_garage
 * @property mixed has_well
 * @property mixed has_public_street_view
 * @property mixed has_sea_view
 * @property mixed elementary_schools_no
 * @property mixed preparatory_schools_no
 * @property mixed secondary_schools_no
 * @property mixed kindergarten_no
 * @property mixed pharmacy_no
 * @property mixed mosque_no
 * @property mixed hospital_no
 * @property mixed bakery_no
 * @property mixed mall_no
 * @property mixed is_residential
 * @property mixed is_agricultural
 * @property mixed is_commercial
 * @property mixed is_industrial
 * @property mixed is_taboo
 * @property mixed has_attic
 * @method EstateType find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class EstateType extends Model
{
    protected $table = 'estate_types';
    protected $fillable = ['name','name_ar','land_area','building_area','building_age','apartment_area','apartment_floor','land_interface','shop_length_area','shop_width_area','room_no','bathroom_no','halls_no','floors_no','finishing_type','description','has_garage','has_well','has_public_street_view','has_sea_view','elementary_schools_no','preparatory_schools_no','secondary_schools_no','kindergarten_no','pharmacy_no','mosque_no','hospital_no','bakery_no','mall_no','is_residential','is_agricultural','is_commercial','is_industrial','is_taboo','has_attic',];

    public function city(){
        return $this->belongsTo(City::class);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameAr()
    {
        return $this->name_ar;
    }

    /**
     * @param mixed $name_ar
     */
    public function setNameAr($name_ar): void
    {
        $this->name_ar = $name_ar;
    }

    /**
     * @return mixed
     */
    public function getLandArea()
    {
        return $this->land_area;
    }

    /**
     * @param mixed $land_area
     */
    public function setLandArea($land_area): void
    {
        $this->land_area = $land_area;
    }

    /**
     * @return mixed
     */
    public function getBuildingArea()
    {
        return $this->building_area;
    }

    /**
     * @param mixed $building_area
     */
    public function setBuildingArea($building_area): void
    {
        $this->building_area = $building_area;
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
    public function getApartmentArea()
    {
        return $this->apartment_area;
    }

    /**
     * @param mixed $apartment_area
     */
    public function setApartmentArea($apartment_area): void
    {
        $this->apartment_area = $apartment_area;
    }

    /**
     * @return mixed
     */
    public function getApartmentFloor()
    {
        return $this->apartment_floor;
    }

    /**
     * @param mixed $apartment_floor
     */
    public function setApartmentFloor($apartment_floor): void
    {
        $this->apartment_floor = $apartment_floor;
    }

    /**
     * @return mixed
     */
    public function getLandInterface()
    {
        return $this->land_interface;
    }

    /**
     * @param mixed $land_interface
     */
    public function setLandInterface($land_interface): void
    {
        $this->land_interface = $land_interface;
    }

    /**
     * @return mixed
     */
    public function getShopLengthArea()
    {
        return $this->shop_length_area;
    }

    /**
     * @param mixed $shop_length_area
     */
    public function setShopLengthArea($shop_length_area): void
    {
        $this->shop_length_area = $shop_length_area;
    }

    /**
     * @return mixed
     */
    public function getShopWidthArea()
    {
        return $this->shop_width_area;
    }

    /**
     * @param mixed $shop_width_area
     */
    public function setShopWidthArea($shop_width_area): void
    {
        $this->shop_width_area = $shop_width_area;
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
    public function getFloorsNo()
    {
        return $this->floors_no;
    }

    /**
     * @param mixed $floors_no
     */
    public function setFloorsNo($floors_no): void
    {
        $this->floors_no = $floors_no;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function getPharmacyNo()
    {
        return $this->pharmacy_no;
    }

    /**
     * @param mixed $pharmacy_no
     */
    public function setPharmacyNo($pharmacy_no): void
    {
        $this->pharmacy_no = $pharmacy_no;
    }

    /**
     * @return mixed
     */
    public function getMosqueNo()
    {
        return $this->mosque_no;
    }

    /**
     * @param mixed $mosque_no
     */
    public function setMosqueNo($mosque_no): void
    {
        $this->mosque_no = $mosque_no;
    }

    /**
     * @return mixed
     */
    public function getHospitalNo()
    {
        return $this->hospital_no;
    }

    /**
     * @param mixed $hospital_no
     */
    public function setHospitalNo($hospital_no): void
    {
        $this->hospital_no = $hospital_no;
    }

    /**
     * @return mixed
     */
    public function getBakeryNo()
    {
        return $this->bakery_no;
    }

    /**
     * @param mixed $bakery_no
     */
    public function setBakeryNo($bakery_no): void
    {
        $this->bakery_no = $bakery_no;
    }

    /**
     * @return mixed
     */
    public function getMallNo()
    {
        return $this->mall_no;
    }

    /**
     * @param mixed $mall_no
     */
    public function setMallNo($mall_no): void
    {
        $this->mall_no = $mall_no;
    }

    /**
     * @return mixed
     */
    public function getIsResidential()
    {
        return $this->is_residential;
    }

    /**
     * @param mixed $is_residential
     */
    public function setIsResidential($is_residential): void
    {
        $this->is_residential = $is_residential;
    }

    /**
     * @return mixed
     */
    public function getIsAgricultural()
    {
        return $this->is_agricultural;
    }

    /**
     * @param mixed $is_agricultural
     */
    public function setIsAgricultural($is_agricultural): void
    {
        $this->is_agricultural = $is_agricultural;
    }

    /**
     * @return mixed
     */
    public function getIsCommercial()
    {
        return $this->is_commercial;
    }

    /**
     * @param mixed $is_commercial
     */
    public function setIsCommercial($is_commercial): void
    {
        $this->is_commercial = $is_commercial;
    }

    /**
     * @return mixed
     */
    public function getIsIndustrial()
    {
        return $this->is_industrial;
    }

    /**
     * @param mixed $is_industrial
     */
    public function setIsIndustrial($is_industrial): void
    {
        $this->is_industrial = $is_industrial;
    }

    /**
     * @return mixed
     */
    public function getIsTaboo()
    {
        return $this->is_taboo;
    }

    /**
     * @param mixed $is_taboo
     */
    public function setIsTaboo($is_taboo): void
    {
        $this->is_taboo = $is_taboo;
    }

    /**
     * @return mixed
     */
    public function getHasAttic()
    {
        return $this->has_attic;
    }

    /**
     * @param mixed $has_attic
     */
    public function setHasAttic($has_attic): void
    {
        $this->has_attic = $has_attic;
    }

}
