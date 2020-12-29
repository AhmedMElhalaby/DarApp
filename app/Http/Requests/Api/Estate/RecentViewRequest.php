<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\EstateResource;
use App\Models\Estate;
use App\Models\SavedSearch;
use App\Models\View;
use App\Traits\ResponseTrait;

class RecentViewRequest extends ApiRequest
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
        ];
    }

    public function persist()
    {
        $Views = (new View())->where('user_id',auth()->user()->getId())->orderBy('created_at','desc')->pluck('estate_id');
        $Objects = EstateResource::collection((new Estate())->whereIn('id', $Views)->paginate(10));
        return $this->successJsonResponse([],$Objects->items(),'Estates',$Objects);
    }
}
