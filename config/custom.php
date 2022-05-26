<?php
return [
    'images' => [
        'shortcut-icon' => '/public/creative-idea1.ico',
        'logo' => '/public/uploads/files/logo.webp',
        'avatar-user' => '/public/sbadmin2/img/undraw_profile.svg',
    ],
    'tour' => [
        'group' => [
            [
                'id' => 0,
                'title' => 'DL trong nước',
                'slug' => 'du-lich-trong-nuoc',
                'description' => 'Du lịch trong nước',
            ],
            [
                'id' => 1,
                'title' => 'DL ngoài nước',
                'slug' => 'du-lich-ngoai-nuoc',
                'description' => 'Du lịch ngoài nước',
            ],
        ],
        'place' => [
            0 => 'Nơi Khởi hành', 
            1 => 'Nơi đến'
        ]
    ], 
    'post' => [
        'category_home' => 2
    ],
    'seo' => [
        'description' => 'Du lịch 3 miền',
        'keyword' => ['Du lịch trong nước', 'du lịch nước ngoài'],
    ]
];