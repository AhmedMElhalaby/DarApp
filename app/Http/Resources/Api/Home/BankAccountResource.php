<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lang = app()->getLocale();
        $Object['id'] = $this->getId();
        $Object['bank_name'] = $this->bank_name;
        $Object['account_name'] = $this->account_name;
        $Object['account_number'] = $this->account_number;
        $Object['account_iban'] = $this->account_iban;
        return $Object;
    }

}
