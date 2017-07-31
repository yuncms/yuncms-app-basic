<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            //自动应答
            'interactive' => 0,
            //命名空间
            'migrationNamespaces' => [
                'app\migrations',
                'yuncms\system\migrations',
                'yuncms\tag\migrations',
                'yuncms\user\migrations',
                'yuncms\question\migrations',
                'yuncms\comment\migrations',
                'yuncms\attachment\migrations',
                'yuncms\oauth2\migrations',
                //'yuncms\message\migrations',
            ],
            // 完全禁用非命名空间迁移
            //'migrationPath' => null,
        ],
//        'fixture' => [ // Fixture generation command line.
//            'class' => 'yii\faker\FixtureController',
//        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
