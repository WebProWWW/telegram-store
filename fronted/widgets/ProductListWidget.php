<?php

namespace app\fronted\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;

/**
* 
*/
class ProductListWidget extends Widget
{

  public $dataModels;
  public $itemWrapAttrClass;

  public function init()
  {
    parent::init();
  }

  public function run()
  {
    return $this->render('product-list', [
      'itemWrapAttrClass' => ($this->itemWrapAttrClass) ? $this->itemWrapAttrClass : '',
      'modelsArr' => $this->dataModels,
    ]);
  }

}

/**/