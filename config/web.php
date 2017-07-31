<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@root'   => '@app',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'asdfasdf',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection'
        ],
        'i18n' => [//多语言配置
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],

                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yuncms/user/messages',
                ],


                'attachment' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yuncms/attachment/messages',
                ],
                'tag' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yuncms/tag/messages',
                ],

                'oauth2' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yuncms/oauth2/messages',
                ],
            ]
        ],
    ],
    'modules' => [
        'system' => [
            'class' => 'yuncms\system\frontend\Module'
        ],
        'user' => [
            'class' => 'yuncms\user\frontend\Module'
        ],
        'attachment' => [
            'class' => 'yuncms\attachment\frontend\Module',
        ],
        'comment' => [
            'class' => 'yuncms\comment\frontend\Module',
        ],
        'question' => [
            'class' => 'yuncms\question\frontend\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
