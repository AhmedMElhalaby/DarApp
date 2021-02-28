<?php

namespace App\Http\Requests\Api\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\AreaResource;
use App\Models\Area;
use App\Traits\ResponseTrait;

/**
 * @property mixed city_id
 */
class AreaRequest extends ApiRequest
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
            'city_id'=>'required|exists:cities,id'
        ];
    }

    public function persist()
    {
        $Areas = new Area();
        $Areas = $Areas->where('is_active',true);
        $Areas = $Areas->where('city_id',$this->city_id);
        $Areas = $Areas->get();
        return $this->successJsonResponse([],AreaResource::collection($Areas),'Areas');
    }
}
