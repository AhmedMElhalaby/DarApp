<?php

namespace App\Http\Requests\Admin\AppData\Setting;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldsRequest extends FormRequest
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
    public function preset($crud){
        $facebook = Setting::where('key','facebook')->first();
        $facebook->setValue($this->filled('facebook')?$this->facebook:'');
        $facebook->save();
        $instagram = Setting::where('key','instagram')->first();
        $instagram->setValue($this->filled('instagram')?$this->instagram:'');
        $instagram->save();
        $email = Setting::where('key','email')->first();
        $email->setValue($this->filled('email')?$this->email:'');
        $email->save();
        $mobile = Setting::where('key','mobile')->first();
        $mobile->setValue($this->filled('mobile')?$this->mobile:'');
        $mobile->save();
        $address = Setting::where('key','address')->first();
        $address->setValue($this->filled('address')?$this->address:'');
        $address->save();;
        $lat = Setting::where('key','location')->first();
        $lat->setValue($this->filled('lat')?$this->lat:'');
        $lat->save();;
        $lng = Setting::where('key','location')->first();
        $lng->setValue($this->filled('lng')?$this->lng:'');
        $lng->save();
        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
