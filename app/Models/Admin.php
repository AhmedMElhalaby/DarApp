<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * @property integer id
 * @property string name
 * @property string email
 * @property string password
 * @property mixed remember_token
 * @property mixed avatar
 * @property boolean is_active
 * @method Admin find(int $id)
 */
class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [ 'name','email','password','remember_token','avatar','is_active'];

    protected $hidden = ['password'];

    /**
     * @return HasMany
     */
    public function roles(){
        return $this->hasMany(ModelRole::class,'employee_id','id');
    }
    /**
     * @return HasMany
     */
    public function permissions(){
        return $this->hasMany(ModelPermission::class,'permission_id','id');
    }
    /**
     * @param $id
     * @return bool
     */
    public function hasRole($id): bool{
        return (ModelRole::where('model_id',$this->getId())->where('role_id',$id)->first())?true:false;
    }
    /**
     * @param $id
     * @return bool
     */
    public function hasPermission($id): bool{
        return (ModelPermission::where('model_id',$this->getId())->where('permission_id',$id)->first())?true:false;
    }

    /**
     * @param iterable|string $ability
     * @param array $arguments
     * @return bool
     */
    public function can($ability, $arguments = [])
    {
        $Permission = Permission::where('name',$ability)->first();
        if(!$Permission)
            return true;
        return $this->hasPermission($Permission->getId());
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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
        $this->password = $password;
    }

    /**
     * Set the user's first name.
     *
     * @param  string  $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    /**
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @param mixed $remember_token
     */
    public function setRememberToken($remember_token): void
    {
        $this->remember_token = $remember_token;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
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

}
