<?php

namespace App\Models;

use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed estate_type
 * @property mixed estate_offer_type
 * @property mixed city_id
 * @property mixed area_id
 * @property mixed currency_id
 * @property mixed street
 * @property mixed price
 * @property mixed estate_area
 * @property mixed land_area
 * @property mixed building_area
 * @property mixed building_age
 * @property mixed room_no
 * @property mixed bathroom_no
 * @property mixed halls_no
 * @property mixed floors_no
 * @property mixed elementary_schools_no
 * @property mixed preparatory_schools_no
 * @property mixed secondary_schools_no
 * @property mixed kindergarten_no
 * @property mixed pharmacy_no
 * @property mixed mosque_no
 * @property mixed hospital_no
 * @property mixed bakery_no
 * @property mixed mall_no
 * @property mixed finishing_type
 * @property mixed description
 * @property mixed has_garage
 * @property mixed has_well
 * @property mixed has_public_street_view
 * @property mixed has_sea_view
 * @property mixed apartment_area
 * @property mixed apartment_floor
 * @property mixed land_interface
 * @property mixed is_residential
 * @property mixed is_agricultural
 * @property mixed is_commercial
 * @property mixed is_industrial
 * @property mixed is_taboo
 * @property mixed is_payment_type_cash
 * @property mixed is_payment_type_installment
 * @property mixed is_payment_type_switching
 * @property mixed has_attic
 * @property mixed shop_length_area
 * @property mixed shop_width_area
 * @property mixed contact_name
 * @property mixed contact_identity
 * @property mixed contact_mobile1
 * @property mixed contact_mobile2
 * @property mixed lat
 * @property mixed lng
 * @property mixed status
 * @property mixed code
 * @property boolean is_active
 * @property boolean is_confirmed
 * @method Estate find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Estate extends Model
{
    protected $table = 'estates';
    protected $fillable = ['user_id','estate_type','estate_offer_type','city_id','area_id','currency_id','street','price','estate_area','land_area','building_area','building_age','room_no','bathroom_no','halls_no','floors_no','elementary_schools_no','preparatory_schools_no','secondary_schools_no','kindergarten_no','pharmacy_no','mosque_no','hospital_no','bakery_no','mall_no','finishing_type','description','has_garage','has_well','has_public_street_view','has_sea_view','apartment_area','apartment_floor','land_interface','is_residential','is_agricultural','is_commercial','is_industrial','is_taboo','is_payment_type_cash','is_payment_type_installment','is_payment_type_switching','has_attic','shop_length_area','shop_width_area','contact_name','contact_identity','contact_mobile1','contact_mobile2','status','code','lat','lng','is_active','is_confirmed'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function currency(){
        return $this->belongsTo(Currency::class);
    }
    public function estate_type_rel(){
        return $this->belongsTo(EstateType::class,'estate_type','id');
    }
    public function estate_media(){
        return $this->hasMany(Media::class,'ref_id','id')->where('media_type',Constant::MEDIA_TYPES['Estate Media']);
    }
    public function neighborhood_media(){
        return $this->hasMany(Media::class,'ref_id','id')->where('media_type',Constant::MEDIA_TYPES['Estate Neighborhood Media']);
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
    public function getCurrencyId()
    {
        return $this->currency_id;
    }

    /**
     * @param mixed $currency_id
     */
    public function setCurrencyId($currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
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
    public function getIsPaymentTypeCash()
    {
        return $this->is_payment_type_cash;
    }

    /**
     * @param mixed $is_payment_type_cash
     */
    public function setIsPaymentTypeCash($is_payment_type_cash): void
    {
        $this->is_payment_type_cash = $is_payment_type_cash;
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
    public function getIsPaymentTypeSwitching()
    {
        return $this->is_payment_type_switching;
    }

    /**
     * @param mixed $is_payment_type_switching
     */
    public function setIsPaymentTypeSwitching($is_payment_type_switching): void
    {
        $this->is_payment_type_switching = $is_payment_type_switching;
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
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * @param mixed $contact_name
     */
    public function setContactName($contact_name): void
    {
        $this->contact_name = $contact_name;
    }

    /**
     * @return mixed
     */
    public function getContactIdentity()
    {
        return $this->contact_identity;
    }

    /**
     * @param mixed $contact_identity
     */
    public function setContactIdentity($contact_identity): void
    {
        $this->contact_identity = $contact_identity;
    }

    /**
     * @return mixed
     */
    public function getContactMobile1()
    {
        return $this->contact_mobile1;
    }

    /**
     * @param mixed $contact_mobile1
     */
    public function setContactMobile1($contact_mobile1): void
    {
        $this->contact_mobile1 = $contact_mobile1;
    }

    /**
     * @return mixed
     */
    public function getContactMobile2()
    {
        return $this->contact_mobile2;
    }

    /**
     * @param mixed $contact_mobile2
     */
    public function setContactMobile2($contact_mobile2): void
    {
        $this->contact_mobile2 = $contact_mobile2;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isIsActive(): bool
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     */
    public function setIsActive(bool $is_active): void
    {
        $this->is_active = $is_active;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng): void
    {
        $this->lng = $lng;
    }

    /**
     * @return bool
     */
    public function isIsConfirmed(): bool
    {
        return $this->is_confirmed;
    }

    /**
     * @param bool $is_confirmed
     */
    public function setIsConfirmed(bool $is_confirmed): void
    {
        $this->is_confirmed = $is_confirmed;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

}
