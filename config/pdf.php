<?php

return [
    'mode' => 'utf-8',
    'format' => 'A3',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'creator' => 'Api Document Generator',
    'display_mode' => 'fullpage',
    'tempDir' => base_path('../temp/'),
    'autoLangToFont' => true,
    'default_font_size' => '16',
    'default_font' => 'IranSans',
    'font_path' => base_path('resources/fonts/'),
    'font_data' => [
        'IranSans' => [
            'R' => 'Vazir.ttf',    // regular font
            'B' => 'Vazir-Bold.ttf',       // optional: bold font
            'useOTL' => 0xFF,
            'useKashida' => 75,
            'unAGlyphs' => true,
        ]
    ]
];
