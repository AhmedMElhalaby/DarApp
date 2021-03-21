<?php

namespace App\Http\Requests\Admin\AppContent\Estate;

use App\Helpers\Constant;
use App\Models\Estate;
use App\Models\Media;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;
use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class MediaDestroyRequest extends FormRequest
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
            'media_id'=>'required|exists:media,id',
        ];
    }

    public function preset($crud)
    {
        $Object = (new Media())->find($this->media_id);
        $Object->delete();
        return $this->successJsonResponse([]);
    }
}
