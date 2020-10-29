<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

/**
 * @property integer id
 * @property string name
 * @property string mobile
 * @property mixed email
 * @property string password
 * @property mixed avatar
 * @property string app_locale
 * @property boolean is_active
 * @property string|null device_token
 * @property string|null device_type
 * @property string|null lat
 * @property string|null lng
 * @property mixed email_verified_at
 * @property mixed mobile_verified_at
 * @method User find(int $id)
 */
class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    protected $fillable = ['name','mobile','email','password','avatar','app_locale','is_active','device_token','device_type','lat','lng','email_verified_at','mobile_verified_at',];

    protected $hidden = ['password'];

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getLat(): ?string
    {
        return $this->lat;
    }

    /**
     * @param string|null $lat
     */
    public function setLat(?string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string|null
     */
    public function getLng(): ?string
    {
        return $this->lng;
    }

    /**
     * @param string|null $lng
     */
    public function setLng(?string $lng): void
    {
        $this->lng = $lng;
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = Hash::make($password);
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return ($this->avatar)?asset($this->avatar):null;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = Functions::StoreImageModel($avatar,'users/avatar');
    }

    /**
     * @return string
     */
    public function getAppLocale(): string
    {
        return $this->app_locale;
    }

    /**
     * @param string $app_locale
     */
    public function setAppLocale(string $app_locale): void
    {
        $this->app_locale = $app_locale;
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
     * @return string|null
     */
    public function getDeviceToken(): ?string
    {
        return $this->device_token;
    }

    /**
     * @param string|null $device_token
     */
    public function setDeviceToken(?string $device_token): void
    {
        $this->device_token = $device_token;
    }

    /**
     * @return string|null
     */
    public function getDeviceType(): ?string
    {
        return $this->device_type;
    }

    /**
     * @param string|null $device_type
     */
    public function setDeviceType(?string $device_type): void
    {
        $this->device_type = $device_type;
    }

    /**
     * @return mixed
     */
    public function getEmailVerifiedAt()
    {
        return $this->email_verified_at;
    }

    /**
     * @param mixed $email_verified_at
     */
    public function setEmailVerifiedAt($email_verified_at): void
    {
        $this->email_verified_at = $email_verified_at;
    }

    /**
     * @return mixed
     */
    public function getMobileVerifiedAt()
    {
        return $this->mobile_verified_at;
    }

    /**
     * @param mixed $mobile_verified_at
     */
    public function setMobileVerifiedAt($mobile_verified_at): void
    {
        $this->mobile_verified_at = $mobile_verified_at;
    }

}
