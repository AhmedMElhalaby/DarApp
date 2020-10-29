<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer model_id
 * @property integer permission_id
 * @method ModelPermission find($id)
 */
class ModelPermission extends Model
{
    protected $table = 'model_permissions';
    protected $fillable = ['model_id','permission_id'];


    public function model(){
        return $this->belongsTo(Admin::class,'model_id');
    }
    public function permission(){
        return $this->belongsTo(Permission::class);
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
