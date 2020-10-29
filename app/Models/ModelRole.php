<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer model_id
 * @property integer role_id
 * @method ModelRole find($id)
 */
class ModelRole extends Model
{
    protected $table = 'model_roles';
    protected $fillable = ['model_id','role_id'];


    public function model(){
        return $this->belongsTo(Admin::class,'model_id');
    }
    public function role(){
        return $this->belongsTo(Role::class);
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
    public function getModelId(): int
    {
        return $this->model_id;
    }

    /**
     * @param int $model_id
     */
    public function setModelId(int $model_id): void
    {
        $this->model_id = $model_id;
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

}
