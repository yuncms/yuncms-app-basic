<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
//合并迁移命名空间
$migrationNamespaces = array_merge(
    require(__DIR__ . '/../vendor/yuncms/migrations.php'),
    [
        'app\migrations',
    ]
);
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
            'interactive' => 0,//自动应答
            'migrationPath' => null,// 完全禁用非命名空间迁移
            'migrationNamespaces' => $migrationNamespaces,//命名空间
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
