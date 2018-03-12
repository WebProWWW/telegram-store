<?php
return [
    'id' => 'store',
    'name' => 'Telegram-Store',
    'charset' => 'utf-8',
    'language' => 'ru',
    'basePath' => __DIR__,
    'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
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
        ],
        'suffix' => '.html',
        'showScriptName' => false,
      ],
    ],
];