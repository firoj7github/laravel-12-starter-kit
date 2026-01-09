<?php

use App\Enums\Status;

return[

    'roles' => [
        'admin'  => 'admin',
        'vendor' => 'vendor',
        'user'   => 'user',
    ],

    'status' => [
        'default' => [
            Status::INACTIVE->value  => 'Inactive',
            Status::ACTIVE->value    => 'Active',
        ],
    ],

     'services' => [
        'Booking',
        'Payment',
        'Technical',
        'Transaction',
        'Other',
    ],

    'ratings' => [
        '1',
        '1.5',
        '2',
        '2.5',
        '3',
        '3.5',
        '4',
        '4.5',
        '5',
    ],



    'date_format' => [
        'M j, Y',
        'F d, Y',
        'j F Y',
        'm.d.y',
        'd-m-Y',
        'd/m/Y',
        'D M j Y',
        'jS F, Y (l)',
        'l, jS F Y',
    ],

    'time_format' => [
        'g:i a',
        'h:i:s A',
        'H:i:s',
    ],

];