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
                'service' => 'eoko.console.formatter.bbcode',
                'options' => [
                    'tags' => [
                        'bip'       => ['Eoko\Console\Helper\MessageHelper', 'bip'],
                        'msg'       => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                        'warn'      => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                        'info'      => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                        'danger'    => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                        'success'   => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                        'comment'   => ['Eoko\Console\Helper\MessageHelper', 'msg'],
                    ]
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [
            'eoko.console.message' => 'Eoko\Console\Message\MessageFactory',
            'eoko.console.formatter.bbcode' => 'Eoko\Console\Factory\BbcodeFormatterFactory',
            'eoko.console.renderer.mustache' => 'Eoko\Console\Engine\MustacheEngineFactory'
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'Message' => 'Eoko\Console\Plugin\MessagePlugin',
        ]
    ],
];
