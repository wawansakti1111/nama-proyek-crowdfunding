<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Opsi Metode Pembayaran
    |--------------------------------------------------------------------------
    |
    | Di sini kita menyimpan semua daftar bank dan e-wallet yang tersedia
    | di Indonesia untuk ditampilkan di form admin.
    | Key (kunci) akan disimpan di database, dan Value (nilai) akan ditampilkan ke admin.
    |
    */

    'banks' => [
        'BCA' => 'Bank Central Asia (BCA)',
        'Mandiri' => 'Bank Mandiri',
        'BNI' => 'Bank Negara Indonesia (BNI)',
        'BRI' => 'Bank Rakyat Indonesia (BRI)',
        'CIMB' => 'CIMB Niaga',
        'Permata' => 'Bank Permata',
        'Danamon' => 'Bank Danamon',
        'BSI' => 'Bank Syariah Indonesia (BSI)',
        'BTN' => 'Bank Tabungan Negara (BTN)',
        'Maybank' => 'Maybank Indonesia',
        'OCBC' => 'OCBC NISP',
        'Panin' => 'Panin Bank',
        'Jenius' => 'Jenius / BTPN',
    ],

    'ewallets' => [
        'GoPay' => 'GoPay',
        'DANA' => 'DANA',
        'OVO' => 'OVO',
        'ShopeePay' => 'ShopeePay',
        'LinkAja' => 'LinkAja',
    ],
];