<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
        $Objects['question'] = (app()->getLocale() == 'ar')?$this->question_ar:$this->question;
        $Objects['answer'] = (app()->getLocale() == 'ar')?$this->answer_ar:$this->answer;
        return $Objects;
    }
}
