<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
* 
*/
class AppAsset extends AssetBundle
{
  public $css = [
    'css/bootstrap-theme.css',
    'css/main.css',
  ];
  public $js = [
    'js/main.js',
  ];
  public $depends = [
    'yii\web\JqueryAsset',
    'app\assets\BootstrapAsset',
  ];
}

/**/