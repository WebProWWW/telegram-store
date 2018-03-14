<?php
return [
    'id' => 'store',
    'name' => 'Telegram-Store',
    'charset' => 'utf-8',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
      'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=telegram_store',
        'username' => 'root',
        'password' => 'Timur01031984',
        'charset' => 'utf8',
        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
      ],
      'assetManager' => [
        'bundles' => [
          'yii\web\JqueryAsset' => [
            'sourcePath' => null,   // do not publish the bundle
            'js' => [
              '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            ],
          ],
        ],
      ],
      'request' => [
        'cookieValidationKey' => '6723f7a2625663567d1bcae14da2bba6',
      ],
      'errorHandler' => [
        'errorAction' => 'site/error',
      ],
      'urlManager' => [
        'enablePrettyUrl' => true,
        'enableStrictParsing' => true,
        'rules' => [
          '' => 'site/index',
          // '<alias:[\w\-]+>' => 'site/index',
          'katalog' => 'catalog/index',
          // 'katalog/<alias:[\w\-]+>' => 'catalog/category',
          // 'katalog/<category>/<alias>' => 'catalog/category',
        ],
        'suffix' => '.html',
        'showScriptName' => false,
      ],
    ],
];