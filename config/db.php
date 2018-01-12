<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . getenv('YUNCMS_DB_HOST') . ';dbname=' . getenv('YUNCMS_DB_NAME'),
    'username' => getenv('YUNCMS_DB_USER'),
    'password' => getenv('YUNCMS_DB_PASSWORD'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
