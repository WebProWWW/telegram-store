<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
* 
*/
class BootstrapAsset extends AssetBundle
{
  public $sourcePath = '@vendor/twbs/bootstrap/dist';
  public $css = [
    'css/bootstrap.min.css',
  ];
  public $js = [
    'js/bootstrap.bundle.min.js',
  ];
  public $depends = [
    'yii\web\JqueryAsset',
  ];
}

/**/