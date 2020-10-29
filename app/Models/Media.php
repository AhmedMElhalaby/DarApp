<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer ref_id
 * @property string|null file
 * @property integer media_type
 * @method Media find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Media extends Model
{
    protected $table = 'media';
    protected $fillable = ['ref_id','file','media_type'];

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
    public function getRefId(): int
    {
        return $this->ref_id;
    }

    /**
     * @param int $ref_id
     */
    public function setRefId(int $ref_id): void
    {
        $this->ref_id = $ref_id;
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return ($this->file)?asset($this->file):null;
    }

    /**
     * @param $file
     */
    public function setFile($file): void
    {
        $this->file = Functions::StoreImageModel($file,'media');
    }

    /**
     * @return int
     */
    public function getMediaType(): int
    {
        return $this->media_type;
    }

    /**
     * @param int $media_type
     */
    public function setMediaType(int $media_type): void
    {
        $this->media_type = $media_type;
    }

}
