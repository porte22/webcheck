<?php

use CheckBundle\Listener\EmailListener;
use CheckBundle\Listener\SlackListener;


$emailConfiguration = [
    'to' => [
        'developers@edimotive.com',
        'daniel.berglund@edimotive.com'
    ],
    'host' => 'in-v3.mailjet.com',
    'port' => 25,
    'username' => 'bac50c8d5f41902cc5acdbc294748ab2',
    'password' => '015f964a14214616f6f0282bd0c8d213',
    'subject' => 'Feed checker',
    'from' => 'developers@edimotive.com'
];

$slackConfiguration = [
    /**Prod**/
    'endpoint' => 'https://hooks.slack.com/services/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',
    /**Ale**/
    //  'endpoint' => 'https://hooks.slack.com/services/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',
    'channel' => 'feeds-check',
    'tags' => [
        //'@luca.giacalone',
        //'@daniel.berglund',
        //'@ginger.lindberg'
    ],
    'tags_-2' => [
        '@luca.giacalone',
        '@daniel.berglund',
        '@ginger.lindberg'
    ],
];
$slackAmpConfiguration = [
    /**Ale**/
    //'endpoint' => 'https://hooks.slack.com/services/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',
    /**Daniel**/
    //'endpoint' => 'https://hooks.slack.com/services/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',
    //feed-check-amp
    'endpoint' => 'https://hooks.slack.com/services/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',
    'channel' => 'feeds-check',
    'tags' => [
        '@luca.giacalone',
        '@daniel.berglund',
        '@ginger.lindberg'
    ],
    'tags_-2' => [
        '@luca.giacalone',
        '@daniel.berglund',
        '@ginger.lindberg'
    ],
];
//$defaultSlideshowExpire = 168;
$defaultArticleExpire = 48;

$httpCode = [
    100 => 'Continue',
    101 => 'Switching Protocols',
    102 => 'Processing',
    103 => 'Checkpoint',
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non-Authoritative Information',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    207 => 'Multi-Status',
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    306 => 'Switch Proxy',
    307 => 'Temporary Redirect',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Page Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Request Entity Too Large',
    414 => 'Request-URI Too Long',
    415 => 'Unsupported Media Type',
    416 => 'Requested Range Not Satisfiable',
    417 => 'Expectation Failed',
    418 => 'I\'m a teapot',
    422 => 'Unprocessable Entity',
    423 => 'Locked',
    424 => 'Failed Dependency',
    425 => 'Unordered Collection',
    426 => 'Upgrade Required',
    449 => 'Retry With',
    450 => 'Blocked by Windows Parental Controls',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported',
    506 => 'Variant Also Negotiates',
    507 => 'Insufficient Storage',
    509 => 'Bandwidth Limit Exceeded',
    510 => 'Not Extended'
];

$customErrorCode = [
    -2 => 'Expired'
];

return [
    'editions' => [
        'it' => [
            'link' => [
                'https://it.motor1.com/sitemaps/it/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://it.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://it.motor1.com/rss/msn-slideshow/' => [],
                'https://it.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://it.motor1.com/rss/yahoo-slideshow/' => [],
                'https://it.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://it.motor1.com/feed-uol/' => [],
                'https://it.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-it',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'de' => [
            'link' => [
                'https://de.motor1.com/sitemaps/de/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://de.motor1.com/rss/msn-spyshots/' => [],
                'https://de.motor1.com/rss/msn-tuning/' => [],
                'https://de.motor1.com/rss/msn-reviews/' => [],
                'https://de.motor1.com/rss/msn-autonews/' => [],
                'https://de.motor1.com/rss/msn-slideshow/' => [],
                'https://de.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://de.motor1.com/rss/yahoo-slideshow/' => [],
                'https://de.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://de.motor1.com/feed-uol/' => [],
                'https://de.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-de',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'uk' => [
            'link' => [
                'https://uk.motor1.com/sitemaps/uk/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://uk.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://uk.motor1.com/rss/msn-slideshow/' => [],
                'https://uk.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://uk.motor1.com/rss/yahoo-slideshow/' => [],
                'https://uk.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://uk.motor1.com/feed-uol/' => [],
                'https://uk.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-uk',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'es' => [
            'link' => [
                'https://es.motor1.com/sitemaps/es/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://es.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://es.motor1.com/rss/msn-slideshow/' => [],
                'https://es.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://es.motor1.com/rss/yahoo-slideshow/' => [],
                'https://es.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://es.motor1.com/feed-uol/' => [],
                'https://es.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-es',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'ru' => [
            'link' => [
                'https://ru.motor1.com/sitemaps/ru/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://ru.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://ru.motor1.com/rss/msn-slideshow/' => [],
                'https://ru.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://ru.motor1.com/rss/yahoo-slideshow/' => [],
                'https://ru.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://ru.motor1.com/feed-uol/' => [],
                'https://ru.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-ru',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'br' => [
            'link' => [
                'https://motor1.uol.com.br/sitemaps/br/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://motor1.uol.com.br/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://motor1.uol.com.br/rss/msn-slideshow/' => [],
                'https://motor1.uol.com.br/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://motor1.uol.com.br/rss/yahoo-slideshow/' => [],
                'https://motor1.uol.com.br/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://motor1.uol.com.br/feed-uol/' => [],
                'https://motor1.uol.com.br/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-br',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'fr' => [
            'link' => [
                'https://fr.motor1.com/sitemaps/fr/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://fr.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://fr.motor1.com/rss/msn-slideshow/' => [],
                'https://fr.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://fr.motor1.com/rss/yahoo-slideshow/' => [],
                'https://fr.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://fr.motor1.com/feed-uol/' => [],
                'https://fr.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-fr',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'hu' => [
            'link' => [
                'https://hu.motor1.com/sitemaps/hu/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://hu.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://hu.motor1.com/rss/msn-slideshow/' => [],
                'https://hu.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://hu.motor1.com/rss/yahoo-slideshow/' => [],
                'https://hu.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://hu.motor1.com/feed-uol/' => [],
                'https://hu.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-hu',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'tr' => [
            'link' => [
                'https://tr.motor1.com/sitemaps/tr/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://tr.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://tr.motor1.com/rss/msn-slideshow/' => [],
                'https://tr.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://tr.motor1.com/rss/yahoo-slideshow/' => [],
                'https://tr.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://tr.motor1.com/feed-uol/' => [],
                'https://tr.motor1.com/rss/bytedance/' => []
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-tr',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'us' => [
            'link' => [
                'https://www.motor1.com/sitemaps/www/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://www.motor1.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://www.motor1.com/rss/msn-slideshow/'=>[],
                'https://www.motor1.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://www.motor1.com/rss/yahoo-slideshow/'=>[],
                'https://www.motor1.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://www.motor1.com/feed-uol/'=>[],
                'https://www.motor1.com/rss/bytedance/'=>[]
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-us',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
        'ra' => [
            'link' => [
                'https://www.rideapart.com/sitemaps/ra/news.xml' => [
                    'expires' => $defaultArticleExpire,
                    'amp' => true
                ],
                'https://www.rideapart.com/rss/msn/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://www.rideapart.com/rss/msn-slideshow/'=>[],
                'https://www.rideapart.com/rss/yahoo/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://www.rideapart.com/rss/yahoo-slideshow/'=>[],
                'https://www.rideapart.com/rss/google/' => [
                    'expires' => $defaultArticleExpire,
                ],
                'https://www.rideapart.com/rss/bytedance/'=>[]
            ],
            'listeners' => [
                'email' => $emailConfiguration,
                'slack' => [
                    /**Prod**/
                    'endpoint' => 'https://hooks.slack.com/services/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',
                    /**Ale**/
                    //  'endpoint' => 'https://hooks.slack.com/services/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',
                    'channel' => 'feeds-check-ra',
                    'tags' => [
                        //'@luca.giacalone',
                        //'@daniel.berglund',
                        //'@ginger.lindberg'
                    ],
                    'tags_-2' => [
                        '@luca.giacalone',
                        '@daniel.berglund',
                        '@ginger.lindberg'
                    ],
                ],
            ],
            'amp' => [
                'listeners' => [
                    'email' => $emailConfiguration,
                    'slack' => $slackAmpConfiguration,
                ],
            ],
        ],
    ],
    'setting' => [
        'timeout' => 30,
        'concurrent_requests' => 20,
        'amp' => [
            'request_numeber' => 5,
            'chrome_user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',
            'amphtml_validator_command' => '%s node_modules/amphtml-validator',
            'listener' => [
                'slack' => \CheckBundle\Listener\Amp\AmpSlackListener::class,
                'console' => \CheckBundle\Listener\Amp\AmpConsoleListener::class
            ],
        ],
        'domains' => [
            '*.motorsport.com',
            '*.motor1'
        ],
        'excluded_urls' => ['/content/'],
        'listener' => [
            'email' => \CheckBundle\Listener\EmailListener::class,
            'slack' => \CheckBundle\Listener\SlackListener::class,
            'console' => \CheckBundle\Listener\ConsoleListener::class
        ],

        'http_code' => $httpCode,
        'custom_error_code' => $customErrorCode
    ]
];
