<?php
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yuncms/cms/Yun.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../vendor/yuncms/cms/config/main.php'),
    require(__DIR__ . '/../vendor/yuncms/cms/config/web.php'),
    require(__DIR__ . '/../config/web.php')
);

(new yuncms\web\Application($config))->run();
