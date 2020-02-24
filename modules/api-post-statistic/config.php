<?php

return [
    '__name' => 'api-post-statistic',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/api-post-statistic.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/api-post-statistic' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-app' => NULL
            ],
            [
                'api' => NULL
            ],
            [
                'post' => NULL
            ],
            [
                'post-statistic' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ApiPostStatistic\\Controller' => [
                'type' => 'file',
                'base' => 'modules/api-post-statistic/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'api' => [
            'apiPostTrending' => [
                'path' => [
                    'value' => '/post/trending'
                ],
                'handler' => 'ApiPostStatistic\\Controller\\Statistic::trending',
                'method' => 'GET'
            ],
            'apiPostPopular' => [
                'path' => [
                    'value' => '/post/popular'
                ],
                'handler' => 'ApiPostStatistic\\Controller\\Statistic::popular',
                'method' => 'GET'
            ]
        ]
    ],
    'apiPostStatistic' => [
        'popular' => [
            'created' => '-20 days'
        ],
        'trending' => [
            'created' => '-7 days'
        ]
    ]
];