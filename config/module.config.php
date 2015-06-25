<?php

return [
    'eoko' => [
        'console' => [
            'mustache' => [
                'helpers' => [
//                    'msg' => new \Eoko\Console\Helper\MessageHelper
                ],
            ],
            'renderer' => 'eoko.console.renderer.mustache',
            'formatter' => [
                'service' => 'eoko.console.formatter.shortcode',
                'options' => [
                    'tags' => [
                        'msg'       => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                        'warn'      => ['Eoko\Console\Helper\MessageHelper', 'warn'],
                        'info'      => ['Eoko\Console\Helper\MessageHelper', 'info'],
                        'danger'    => ['Eoko\Console\Helper\MessageHelper', 'danger'],
                        'success'   => ['Eoko\Console\Helper\MessageHelper', 'success'],
                        'comment'   => ['Eoko\Console\Helper\MessageHelper', 'comment'],
                        'verbose'   => ['Eoko\Console\Helper\MessageHelper', 'verbose'],
                        'v'         => ['Eoko\Console\Helper\MessageHelper', 'verbose'],
                        'vv'        => ['Eoko\Console\Helper\MessageHelper', 'verbose'],
                        'vvv'       => ['Eoko\Console\Helper\MessageHelper', 'verbose'],
                        'vvvv'      => ['Eoko\Console\Helper\MessageHelper', 'verbose'],
                    ]
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [
            'eoko.console.message' => 'Eoko\Console\Message\MessageFactory',
            'eoko.console.formatter.shortcode' => 'Eoko\Console\Formatter\ShortCodeFormatterFactory',
            'eoko.console.renderer.mustache' => 'Eoko\Console\Engine\MustacheEngineFactory'
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'Message' => 'Eoko\Console\Plugin\MessagePlugin',
        ]
    ],
];
