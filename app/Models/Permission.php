<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string name
 * @property integer parent
 * @method Permission find($id)
 */
class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name','parent'];
    public function parent_permission(){
        return $this->belongsTo(Permission::class,'parent','id');
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
    public function getParent(): int
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent): void
    {
        $this->parent = $parent;
    }

}
