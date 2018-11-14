<?php
return [
    'https://it.motor1.com' => [
        'navbar' =>
            [
                'urls' => [
                    'news',
                    'da sapere',
                    'prove',
                    'youtester'
                ],
                'method' => 'checkUrlByXPath'
            ],
        'category' => [
            'urls' => [
                'news'
            ],
            'method' => 'getLinkByXPath'
        ],
    ]
];