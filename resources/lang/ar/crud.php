<?php

use App\Helpers\Constant;

return [

    'Admin'=>[
        'crud_names' => 'المدراء',
        'crud_name' => 'مدير',
        'crud_the_name' => 'المدير',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'is_active' => 'الحالة',
        'avatar' => 'الصورة',
    ],
    'User'=>[
        'crud_names' => 'المستخدمين',
        'crud_name' => 'مستخدم',
        'crud_the_name' => 'المستخدم',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة',
        'type' => 'نوع البروفايل',
        'bio' => 'نبذة',
        'balance' => 'الرصيد',
        'favorite_car' => 'السيارة المفضلة',
        'app_locale' => 'اللغة',
        'is_active' => 'الحالة',
        'created_at' => 'تاريخ الإنشاء',
    ],
    'Setting'=>[
        'crud_names' => 'الإعدادات',
        'crud_name' => 'اعداد',
        'crud_the_name' => 'الاعداد',
        'key' => 'الإعداد',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'value' => 'القيمة',
        'value_ar' => 'القيمة عربي',
        'Category' => [
            'page'=>'الصفحات الثابته',
        ],
        'Fields'=>[
            'facebook'=>'صفحة الفيسبوك',
            'instagram'=>'صفحة الانستقرام',
            'email'=>'البريد الالكتروني',
            'mobile'=>'الجوال',
            'address'=>'العنوان',
            'lat'=>'الاحداثي العرضي',
            'lng'=>'الاحداثي الطولي',
        ]
    ],
    'Faq'=>[
        'crud_names' => 'الأسئلة الشائعة',
        'crud_name' => 'سؤال شائع',
        'crud_the_name' => 'السؤال الشائع',
        'question' => 'السؤال',
        'question_ar' => 'السؤال عربي',
        'answer' => 'الإجابة',
        'answer_ar' => 'الإجابة عربي',
        'is_active' => 'الحالة',
    ],
    'Ticket'=>[
        'crud_names' => 'التذاكر',
        'crud_name' => 'تذكرة',
        'crud_the_name' => 'التذكرة',
        'id' => '#',
        'user_id' => 'المستخدم',
        'title' => 'العنوان',
        'message' => 'الرسالة',
        'ticket_response' => 'الرد',
        'response_form' => 'الرد على التذكرة',
        'status' => 'الحالة',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'مفتوحة',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'مغلقة',
        ]
    ],
    'Permission'=>[
        'crud_names' => 'الصلاحيات',
        'crud_name' => 'صلاحية',
        'crud_the_name' => 'الصلاحية',
        'id' => '#',
        'name' => 'الاسم',
    ],
    'Role'=>[
        'crud_names' => 'الأدوار',
        'crud_name' => 'دور',
        'crud_the_name' => 'الدور',
        'id' => '#',
        'name' => 'الاسم',
        'permissions' => 'الصلاحيات',
    ],
    'BankAccount'=>[
        'crud_names' => 'الحسابات البنكية',
        'crud_name' => 'حساب بنكي',
        'crud_the_name' => 'الحساب البنكي',
        'bank_name' => 'البنك',
        'account_name' => 'صاحب الحساب',
        'account_number' => 'رقم الحساب',
        'account_iban' => 'رقم الاي بان',
    ],
];
