<?php
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// Load dotenv?
if (file_exists(dirname(__DIR__) .'/.env')) {
    (new Dotenv\Dotenv(dirname(__DIR__)))->load();
}

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../vendor/yuncms/framework/config/main.php'),
    require(__DIR__ . '/../vendor/yuncms/framework/config/web.php'),
    require(__DIR__ . '/../config/web.php')
);
(new yuncms\web\Application($config))->run();
