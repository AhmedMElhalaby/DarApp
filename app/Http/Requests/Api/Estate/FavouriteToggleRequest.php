<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\Estate;
use App\Models\Favourite;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class FavouriteToggleRequest extends ApiRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'estate_id'=>'required|exists:estates,id'
        ];
    }

    public function persist()
    {
        $Object = (new Favourite())->where('user_id',auth()->user()->getId())->where('estate_id',$this->estate_id)->first();
        if($Object){
            $Object->delete();
        }else{
            $Object = new Favourite();
            $Object->setUserId(auth()->user()->getId());
            $Object->setEstateId($this->estate_id);
            $Object->save();
        }
        return $this->successJsonResponse([],new EstateResource((new Estate())->find($this->estate_id)),'Estates');
    }
}
