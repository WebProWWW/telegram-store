<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

function dump($in)
{
  if (!YII_DEBUG) return '';
  ob_start();
  print_r($in);
  $getClean = ob_get_clean();
  return '<pre>'.$getClean.'</pre>';
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require __DIR__ . '/../config.php';
(new yii\web\Application($config))->run();