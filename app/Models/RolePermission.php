<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer role_id
 * @property integer permission_id
 * @method RolePermission find($id)
 */
class RolePermission extends Model
{
    protected $table = 'role_permissions';
    protected $fillable = ['role_id','permission_id'];

    public function role(){
        return $this->hasMany(Role::class);
    }
    public function permission(){
        return $this->hasMany(Permission::class);
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
    public function getRoleId(): int
    {
        return $this->role_id;
    }

    /**
     * @param int $role_id
     */
    public function setRoleId(int $role_id): void
    {
        $this->role_id = $role_id;
    }

    /**
     * @return int
     */
    public function getPermissionId(): int
    {
        return $this->permission_id;
    }

    /**
     * @param int $permission_id
     */
    public function setPermissionId(int $permission_id): void
    {
        $this->permission_id = $permission_id;
    }

}
