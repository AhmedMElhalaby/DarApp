<?php

namespace App\Http\Resources\Api\General;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $Objects = array();
        $Objects['id'] = $this->id;
        $Objects['title'] = (app()->getLocale() == 'ar')?$this->title_ar:$this->title;
        $Objects['message'] = (app()->getLocale() == 'ar')?$this->message_ar:$this->message;
        $Objects['ref_id'] = $this->ref_id;
        $Objects['type'] = $this->type;
        $Objects['read_at'] = ($this->read_at)?Carbon::parse($this->read_at)->format('Y-m-d h:i A'):null;
        $Objects['created_at'] = ($this->created_at)?Carbon::parse($this->created_at)->format('Y-m-d h:i A'):null;
        return $Objects;
    }
}
