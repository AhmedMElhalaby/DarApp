<?php

namespace App\Http\Requests\Admin\AppContent\Estate;

use App\Helpers\Constant;
use App\Models\Estate;
use App\Models\Media;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ConfirmRequest extends FormRequest
{

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

    public function preset($crud,$id)
    {
        $Object = (new Estate())->find($id);
        $Object->setIsConfirmed(true);
        $Object->save();
        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
