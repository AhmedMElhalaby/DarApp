<?php

use App\Helpers\Constant;

return [

    'Admin'=>[
        'crud_names' => 'Admins',
        'crud_name' => 'Admin',
        'crud_the_name' => 'The Admin',
        'name' => 'Name',
        'email' => 'E-Mail',
        'is_active' => 'Status',
        'avatar' => 'Avatar',
    ],
    'User'=>[
        'crud_names' => 'Users',
        'crud_name' => 'User',
        'crud_the_name' => 'The User',
        'name' => 'Name',
        'email' => 'E-Mail',
        'mobile' => 'Mobile',
        'avatar' => 'Avatar',
        'type' => 'Type',
        'bio' => 'Bio',
        'balance' => 'Balance',
        'favorite_car' => 'Favorite Car',
        'app_locale' => 'App Locale',
        'is_active' => 'Status',
        'created_at' => 'Created At',
    ],
    'Setting'=>[
        'crud_names' => 'Settings',
        'crud_name' => 'Setting',
        'crud_the_name' => 'The Setting',
        'key' => 'Key',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'value' => 'Value',
        'value_ar' => 'Value Ar',
        'Category' => [
            'page'=>'Static Pages',
        ],
        'Fields'=>[
            'facebook'=>'Facebook',
            'instagram'=>'Instagram',
            'email'=>'Email',
            'mobile'=>'Mobile',
            'address'=>'Address',
            'lat'=>'Lat',
            'lng'=>'Lng',
        ]
    ],
    'Faq'=>[
        'crud_names' => 'FAQ',
        'crud_name' => 'Faq',
        'crud_the_name' => 'The Faq',
        'question' => 'Question',
        'question_ar' => 'Question Ar',
        'answer' => 'Answer',
        'answer_ar' => 'Answer Ar',
        'is_active' => 'Status',
    ],
    'Ticket'=>[
        'crud_names' => 'Tickets',
        'crud_name' => 'Ticket',
        'crud_the_name' => 'The Ticket',
        'id' => '#',
        'user_id' => 'User',
        'title' => 'Title',
        'message' => 'Message',
        'ticket_response' => 'Response',
        'status' => 'Status',
        'response_form' => 'Response to the ticket',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'Opened',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'Closed',
        ]
    ],
    'Permission'=>[
        'crud_names' => 'Permissions',
        'crud_name' => 'Permission',
        'crud_the_name' => 'The Permission',
        'id' => '#',
        'name' => 'Name',
    ],
    'Role'=>[
        'crud_names' => 'Roles',
        'crud_name' => 'Role',
        'crud_the_name' => 'The Role',
        'id' => '#',
        'name' => 'Name',
        'permissions' => 'Permissions',
    ],
    'BankAccount'=>[
        'crud_names' => 'Bank Accounts',
        'crud_name' => 'Bank Account',
        'crud_the_name' => 'The Bank Account',
        'bank_name' => 'Bank Name',
        'account_name' => 'Account Name',
        'account_number' => 'Account Number',
        'account_iban' => 'Account Iban',
    ],
];
