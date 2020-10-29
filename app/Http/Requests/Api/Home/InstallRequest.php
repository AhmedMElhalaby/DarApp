<?php

namespace App\Http\Requests\Api\Home;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\BankAccountResource;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Home\DocumentTypeResource;
use App\Http\Resources\Api\Home\SubscriptionResource;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Country;
use App\Models\DocumentType;
use App\Models\Setting;
use App\Models\Subscription;
use App\Traits\ResponseTrait;

class InstallRequest extends ApiRequest
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
        $data = [];
        $SettingsPages = Setting::where('category',Constant::SETTING_CATEGORY['Page'])->pluck((app()->getLocale() =='en')?'value':'value_ar','key')->toArray();
        $data['Settings'] = [
            'Pages'=>$SettingsPages,
            'AboutUs'=>[
                'Facebook'=>Setting::where('key','facebook')->first()->value,
                'Instagram'=>Setting::where('key','instagram')->first()->value,
                'Email'=>Setting::where('key','email')->first()->value,
                'Mobile'=>Setting::where('key','mobile')->first()->value,
                'Address'=>Setting::where('key','address')->first()->value,
                'Location'=>[
                    'lat'=>Setting::where('key','location')->first()->value,
                    'lng'=>Setting::where('key','location')->first()->value_ar,
                ],
            ]
        ];
//        $data['BankAccounts'] = BankAccountResource::collection(BankAccount::where('is_active',true)->get());
        $data['Essentials'] = [
            'TicketsStatus'=>Constant::TICKETS_STATUS,
            'NotificationType'=>Constant::NOTIFICATION_TYPE,
            'SenderType'=>Constant::SENDER_TYPE,
            'VerificationType'=>Constant::VERIFICATION_TYPE,
            'ForgetPasswordType'=>Constant::FORGET_PASSWORD_TYPE,
            'SocialProvider'=>Constant::SOCIAL_PROVIDER,
        ];
        return $this->successJsonResponse([],$data);
    }
}
