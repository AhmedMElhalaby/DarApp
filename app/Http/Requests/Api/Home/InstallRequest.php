<?php

namespace App\Http\Requests\Api\Home;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\AreaResource;
use App\Http\Resources\Api\Home\CityResource;
use App\Http\Resources\Api\Home\CurrencyResource;
use App\Http\Resources\Api\Home\EstateTypeResource;
use App\Http\Resources\Api\Home\LawyerResource;
use App\Models\Admin;
use App\Models\Area;
use App\Models\City;
use App\Models\Currency;
use App\Models\EstateType;
use App\Models\Setting;
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
        $data['Cities'] = CityResource::collection(City::where('is_active',true)->get());
        $data['EstateTypes'] = EstateTypeResource::collection(EstateType::all());
        $data['Lawyers'] = LawyerResource::collection(Admin::where('type',Constant::ADMIN_TYPES['Lawyer'])->get());
        $data['Areas'] = AreaResource::collection(Area::where('is_active',true)->get());
        $data['Currencies'] = CurrencyResource::collection(Currency::where('is_active',true)->get());
        $data['Essentials'] = [
            'TicketsStatus'=>Constant::TICKETS_STATUS,
            'NotificationType'=>Constant::NOTIFICATION_TYPE,
            'SenderType'=>Constant::SENDER_TYPE,
            'VerificationType'=>Constant::VERIFICATION_TYPE,
            'ForgetPasswordType'=>Constant::FORGET_PASSWORD_TYPE,
            'SocialProvider'=>Constant::SOCIAL_PROVIDER,
            'EstateOfferType'=>Constant::ESTATE_OFFER_TYPE,
            'FinishingType'=>Constant::FINISHING_TYPE,
        ];
        return $this->successJsonResponse([],$data);
    }
}
