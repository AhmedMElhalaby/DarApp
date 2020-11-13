<?php

namespace App\Http\Requests\Api\Estate;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Estate\SavedSearchResource;
use App\Models\Media;
use App\Models\SavedSearch;
use App\Traits\ResponseTrait;

class DeleteMediaRequest extends ApiRequest
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
            'media_id'=>'required|exists:media,id'
        ];
    }

    public function persist()
    {
        $Object = (new Media())->find($this->media_id);
        $Object->delete();
        return $this->successJsonResponse([__('messages.deleted_successfully')]);
    }
}
