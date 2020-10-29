<?php

namespace App\Http\Requests\AhmedPanel;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
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
        return [];
    }
    public function preset($crud){
        $Object = $crud->getEntity()->find($this->id);
        $Object->delete();
        return redirect($crud->getRedirect())->with('status', __('admin.messages.deleted_successfully'));
    }
}
