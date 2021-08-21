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
    'City'=>[
        'crud_names' => 'Cities',
        'crud_name' => 'City',
        'crud_the_name' => 'The City',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'is_active' => 'Status',
    ],
    'Currency'=>[
        'crud_names' => 'Currencies',
        'crud_name' => 'Currency',
        'crud_the_name' => 'The Currency',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'is_active' => 'Status',
    ],
    'Area'=>[
        'crud_names' => 'Areas',
        'crud_name' => 'Area',
        'crud_the_name' => 'The Area',
        'city_id' => 'City',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'is_active' => 'Status',
    ],
    'EstateType'=>[
        'crud_names' => 'Estate Types',
        'crud_name' => 'Estate Type',
        'crud_the_name' => 'The Estate Type',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
        'land_area' => 'Land Area',
        'building_area' => 'Building Area',
        'building_age' => 'Building Age',
        'apartment_area' => 'Apartment Area',
        'apartment_floor' => 'Apartment Floor',
        'land_interface' => 'Land Interface',
        'shop_length_area' => 'Shop Length Area',
        'shop_width_area' => 'Shop Width Area',
        'room_no' => 'Room No',
        'bathroom_no' => 'Bathroom No',
        'halls_no' => 'Halls No',
        'floors_no' => 'Floors No',
        'finishing_type' => 'Finishing Type',
        'description' => 'Description',
        'has_garage' => 'Has Garage',
        'has_well' => 'Has Well',
        'has_public_street_view' => 'Has Public Street View',
        'has_sea_view' => 'Has Sea View',
        'elementary_schools_no' => 'Elementary Schools',
        'preparatory_schools_no' => 'Preparatory Schools',
        'secondary_schools_no' => 'Secondary Schools',
        'kindergarten_no' => 'Kindergarten',
        'pharmacy_no' => 'Pharmacy',
        'mosque_no' => 'Mosque',
        'hospital_no' => 'Hospital',
        'bakery_no' => 'Bakery',
        'mall_no' => 'Mall',
        'is_residential' => 'Is Residential',
        'is_agricultural' => 'Is Agricultural',
        'is_commercial' => 'Is Commercial',
        'is_industrial' => 'Is Industrial',
        'is_taboo' => 'Is Taboo',
        'has_attic' => 'Has Attic',
    ],
    'Estate'=>[
        'crud_names' => 'Estates',
        'crud_name' => 'Estate',
        'crud_the_name' => 'The Estate',
        'user_id' => 'User',
        'city_id' => 'City',
        'currency_id' => 'Currency',
        'area_id' => 'Area',
        'street' => 'Street',
        'estate_area' => 'Estate Area',
        'price' => 'Price',
        'code' => 'Code',
        'estate_type' => 'Estate Type',
        'estate_offer_type' => 'Estate Offer Type',
        'is_active' => 'Status',
        'land_area' => 'Land Area',
        'building_area' => 'Building Area',
        'building_age' => 'Building Age',
        'apartment_area' => 'Apartment Area',
        'apartment_floor' => 'Apartment Floor',
        'land_interface' => 'Land Interface',
        'shop_length_area' => 'Shop Length Area',
        'shop_width_area' => 'Shop Width Area',
        'finishing_type' => 'Finishing Type',
        'room_no' => 'Room No',
        'bathroom_no' => 'Bathroom No',
        'halls_no' => 'Halls No',
        'floors_no' => 'Floors No',
        'description' => 'Description',
        'has_garage' => 'Has Garage',
        'has_well' => 'Has Well',
        'has_public_street_view' => 'Has Public Street View',
        'has_sea_view' => 'Has Sea View',
        'elementary_schools_no' => 'Elementary Schools No',
        'preparatory_schools_no' => 'Preparatory Schools No',
        'secondary_schools_no' => 'Secondary Schools No',
        'kindergarten_no' => 'Kindergarten No',
        'pharmacy_no' => 'Pharmacy',
        'mosque_no' => 'Mosque',
        'hospital_no' => 'Hospital',
        'bakery_no' => 'Bakery',
        'mall_no' => 'Mall',
        'is_residential' => 'Residential',
        'is_agricultural' => 'Agricultural',
        'is_commercial' => 'Commercial',
        'is_industrial' => 'Industrial',
        'is_taboo' => 'Is Taboo',
        'has_attic' => 'Has Attic',
        'estate_media' => 'Estate Media',
        'neighborhood_media' => 'Neighborhood Media',
        'is_payment_type_cash' => 'Available Cash Payment',
        'is_payment_type_installment' => 'Available Installment Payment',
        'is_payment_type_switching' => 'Available Switching',
        'contact_name' => 'Contact Name',
        'contact_identity' => 'Identity',
        'contact_mobile1' => 'Mobile (1) ',
        'contact_mobile2' => 'Mobile (2) ',
        'lat' => 'Lat',
        'lng' => 'Lng',
        'created_at' => 'Created At',
        'is_confirmed' => 'Is Confirmed',
        'Links'=>[
            'confirm'=>'Confirm Estate'
        ],
        'FinishingTypes' => [
            ''.Constant::FINISHING_TYPE['No Finishing']=>'No Finishing',
            ''.Constant::FINISHING_TYPE['Full Finishing']=>'Full Finishing',
            ''.Constant::FINISHING_TYPE['Super Finishing']=>'Super Finishing',
        ],
        'EstateOfferTypes' => [
            ''.Constant::ESTATE_OFFER_TYPE['Selling']=>'Selling',
            ''.Constant::ESTATE_OFFER_TYPE['Renting']=>'Renting',
            ''.Constant::ESTATE_OFFER_TYPE['Switching']=>'Switching',
        ],
        'Tabs' => [
            'basic_info'=>'Basic Info',
            'estate_details'=>'Estate Details',
            'estate_media'=>'Estate Media',
            'payment_and_contact'=>'Payment & Contact',
        ],
    ],
];
