<?php


namespace App\Helpers;


class Constant
{
    const NOTIFICATION_TYPE = [
        'General'=>1,
        'Ticket'=>3,
        'Chat'=>4,
    ];
    const VERIFICATION_TYPE = [
        'Email'=>1,
        'Mobile'=>2
    ];
    const VERIFICATION_TYPE_RULES = '1,2';

    const FORGET_PASSWORD_TYPE = [
        'Email'=>1,
        'Mobile'=>2
    ];
    const FORGET_PASSWORD_TYPE_RULES = '1,2';

    const SETTING_CATEGORY = [
        'Field'=>1,
        'Page'=>2,
    ];
    const TICKETS_STATUS = [
        'Open'=>1,
        'Closed'=>2
    ];
    const SENDER_TYPE = [
        'User'=>1,
        'Admin'=>2,
    ];
    const SOCIAL_PROVIDER = [
        'Facebook'=>1,
        'Google'=>2,
    ];
    const SOCIAL_PROVIDER_TEXT = [
        1=>'facebook',
        2=>'google',
    ];
    const SOCIAL_PROVIDER_RULES = '1,2';



    const ESTATE_OFFER_TYPE = [
        'Selling'=>1,
        'Renting'=>2,
        'Switching'=>3,
    ];
    const ESTATE_OFFER_TYPE_RULES = '1,2,3';

    const FINISHING_TYPE = [
        'No Finishing'=>1,
        'Full Finishing'=>2,
        'Super Finishing'=>3,
    ];
    const FINISHING_TYPE_RULES = '1,2,3';
    const MEDIA_TYPES = [
        'Estate Media'=>1,
        'Estate Neighborhood Media'=>2,
    ];
    const ADMIN_TYPES = [
        'Admin'=>1,
        'Lawyer'=>2,
    ];
}
