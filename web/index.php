<?php
if(getenv('APP_ENV') == 'Development'){
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yuncms/cms/Yun.php');

$config = require(__DIR__ . '/../config/web.php');

(new yuncms\web\Application($config))->run();
