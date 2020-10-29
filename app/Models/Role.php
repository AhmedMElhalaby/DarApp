<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string name
 * @property integer type
 * @method Role find($id)
 */
class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','type'];

    public function role_permissions(){
        return $this->hasMany(RolePermission::class);
    }

    /**
     * @param $id
     * @return bool
     */
    public function hasPermission($id){
        return (RolePermission::where('role_id',$this->getId())->where('permission_id',$id)->first())?true:false;
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

}
