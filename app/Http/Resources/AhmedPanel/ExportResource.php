<?php

namespace App\Http\Resources\AhmedPanel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExportResource extends JsonResource
{

    protected $Fields;

    /**
     * ExportResource constructor.
     * @param $resource
     * @param array $Fields
     */
    public function __construct($resource,array $Fields)
    {
        $this->Fields = $Fields;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $Object['id'] = $this->id;
//        foreach ($this->Fields as $field){
//            $export = true;
//            if(isset($field['export']) && $field['export'] == false) $export = false;
//            if ($export){
//                $Object[$field['name']] = $this->{$field['name']};
//            }
//        }
        return $Object;
    }

}
