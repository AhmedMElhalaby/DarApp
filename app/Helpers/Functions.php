<?php


namespace App\Helpers;


use App\Models\Notification;
use App\Models\PasswordReset;
use App\Models\VerifyAccounts;
use App\Notifications\PasswordReset as PasswordResetNotification;
use App\Notifications\VerifyAccount;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class Functions
{
    use ResponseTrait;
    public static function SendNotification($user,$title,$msg,$title_ar,$msg_ar,$ref_id = null,$type= 0,$store = true,$replace =[])
    {
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $registrationIds = $user->device_token;

        $message = array
        (
            'body'  => ($user->getAppLocale() == 'en')?$msg:$msg_ar,
            'title' => ($user->getAppLocale() == 'en')?$title:$title_ar,
            'sound' => true,
        );
        $extraNotificationData = ["ref_id" =>$ref_id,"type"=>$type];
        $fields = array
        (
            'to'        => $registrationIds,
            'notification'  => $message,
            'data' => $extraNotificationData
        );
        $headers = array
        (
            'Authorization: key='.config('app.notification_key') ,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        if($store){
            $notify = new Notification();
            $notify->setType($type);
            $notify->setUserId($user->id);
            $notify->setTitle($title);
            $notify->setMessage($msg);
            $notify->setTitleAr($title_ar);
            $notify->setMessageAr($msg_ar);
            $notify->setRefId(@$ref_id);
            $notify->save();
        }
        return true;
    }
    public static function SendNotifications($users,$title,$msg,$ref_id = null,$type= 0,$store = true,$replace =[])
    {
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $registrationIds = [];
        foreach ($users as $user){
            $registrationIds[] = $user->device_token;

        }

        $message = array
        (
            'body'  => $msg,
            'title' => $title,
            'sound' => true,
        );
        $extraNotificationData = ["ref_id" =>$ref_id,"type"=>$type];
        $fields = array
        (
            'registration_ids' => $registrationIds,
            'notification' => $message,
            'data' => $extraNotificationData
        );
        $headers = array
        (
            'Authorization: key='.config('app.notification_key') ,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        if($store){
            foreach ($users as $user){
                $notify = new Notification();
                $notify->setType($type);
                $notify->setUserId($user->id);
                $notify->setTitle($title);
                $notify->setMessage($msg);
                $notify->setTitleAr($title);
                $notify->setMessageAr($msg);
                $notify->setRefId(@$ref_id);
                $notify->save();
            }
        }
        return true;
    }
    public static function SendSms($msg,$to){
        $ch = curl_init();
        $userid = 'darProject';
        $password = 'darProject2021';
        $sender = 'Dar.app';
        $text = urlencode($msg);
        $encoding = 'UTF8';
        // auth call
        $url = "https://www.nsms.ps/api.php?comm=sendsms&user={$userid}&pass={$password}&to={$to}&message={$text}&sender={$sender}";
        $ret  = json_decode(file_get_contents($url), true);
        $response = curl_exec($ch);
        curl_close($ch);
    }
    public static function SendVerification($user,$type = null){
        if($type != null){
            switch ($type){
                case Constant::VERIFICATION_TYPE['Email']:{
                    if($user->getEmailVerifiedAt() != null)
                        return (new Functions)->failJsonResponse([__('auth.verified_before')]);
                    $code_email = rand( 1000 , 9999 );
                    $token = Str::random(40).time();
                    VerifyAccounts::updateOrCreate(
                        ['user_id' => $user->getId(),'type'=>Constant::VERIFICATION_TYPE['Email']],
                        [
                            'user_id' => $user->getId(),
                            'code' => $code_email,
                            'token' => $token,
                            'type'=>Constant::VERIFICATION_TYPE['Email']
                        ]
                    );
                    $user->notify(
                        new VerifyAccount($token,$code_email)
                    );
                    break;
                }
                case Constant::VERIFICATION_TYPE['Mobile']:{
                    if($user->getMobileVerifiedAt() != null)
                        return (new Functions)->failJsonResponse([__('auth.mobile_verified_before')]);
                    $code_mobile = rand( 1000 , 9999 );
                    $token = Str::random(40).time();
                    VerifyAccounts::updateOrCreate(
                        ['user_id' => $user->getId(),'type'=>Constant::VERIFICATION_TYPE['Mobile']],
                        [
                            'user_id' => $user->getId(),
                            'code' => $code_mobile,
                            'token' => $token,
                            'type'=>Constant::VERIFICATION_TYPE['Mobile']
                        ]
                    );
                    static::SendSms('كود تفعيل الحساب هو : '.$code_mobile,$user->getMobile());
                    break;
                }
            }
        }else{
            $code_email = rand( 1000 , 9999 );
            $code_mobile = rand( 1000 , 9999 );
            $token = Str::random(40).time();
            VerifyAccounts::updateOrCreate(
                ['user_id' => $user->getId(),'type'=>Constant::VERIFICATION_TYPE['Email']],
                [
                    'user_id' => $user->getId(),
                    'code' => $code_email,
                    'token' => $token,
                    'type'=>Constant::VERIFICATION_TYPE['Email']
                ]
            );
            VerifyAccounts::updateOrCreate(
                ['user_id' => $user->getId(),'type'=>Constant::VERIFICATION_TYPE['Mobile']],
                [
                    'user_id' => $user->getId(),
                    'code' => $code_mobile,
                    'token' => $token,
                    'type'=>Constant::VERIFICATION_TYPE['Mobile']
                ]
            );
            static::SendSms('كود تفعيل الحساب هو : '.$code_mobile,$user->getMobile());
            $user->notify(
                new VerifyAccount($token,$code_email)
            );
        }
        return true;
    }
    public static function SendForget($user,$type = null){
        $code = rand( 1000 , 9999 );
        $token = Str::random(40).time();
        PasswordReset::updateOrCreate(
            ['user_id' => $user->getId()],
            [
                'user_id' => $user->getId(),
                'code' => $code,
                'token' => $token,
            ]
        );
        if($type == Constant::FORGET_PASSWORD_TYPE['Email']){
            $user->notify(
                new PasswordResetNotification($code)
            );
        }
        if($type == Constant::FORGET_PASSWORD_TYPE['Mobile']){
            static::SendSms('كود استرجاع كلمة المرور هو : '.$code,$user->getMobile());
        }
    }
    public static function StoreImage($attribute_name,$destination_path){
        $destination_path = "storage/".$destination_path.'/';
        $request = Request::instance();
        if ($request->hasFile($attribute_name)) {
            $file = $request->file($attribute_name);
            if ($file->isValid()) {
                $file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                $file->move($destination_path, $file_name);
                $attribute_value =  $destination_path.$file_name;
            }
        }
        return $attribute_value??null;
    }
    public static function StoreImageModel($file,$destination_path){
        $destination_path = "storage/".$destination_path.'/';
        if ($file->isValid()) {
            $file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            $file->move($destination_path, $file_name);
            $attribute_value =  $destination_path.$file_name;
        }
        return $attribute_value??null;
    }
    public static function SocialLogin($Provider,$Token){
        switch ($Provider){
            case Constant::SOCIAL_PROVIDER['Google']:{
                $User = [];
                $smsUrl = 'https://oauth2.googleapis.com/tokeninfo?id_token='.$Token;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$smsUrl);
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($result,true);
                if (isset($result['error']))
                    return null;
                $User['provider_id'] = @$result['sub'];
                $User['name'] = @$result['name'];
                $User['email'] = @$result['email'];
                return $User;
            }
            case Constant::SOCIAL_PROVIDER['Facebook']:{
                $Fields = 'email%2Cname';
                $smsUrl = 'https://graph.facebook.com/v4.0/me?access_token='.$Token.'&fields='.$Fields.'';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$smsUrl);
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($result,true);
                if (isset($result['error']))
                    return null;
                $User['provider_id'] = @$result['id'];
                $User['name'] = @$result['name'];
                $User['email'] = @$result['email'];
                return $User;
            }
            default:{
                return null;
            }
        }
    }

}
