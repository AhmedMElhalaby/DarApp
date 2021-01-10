<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LawyerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $Object['id'] = $this->getId();
        $Object['name'] = $this->getName();
        $Object['email'] = $this->getEmail();
        $Object['avatar'] = $this->getAvatar();
        return $Object;
    }

}
