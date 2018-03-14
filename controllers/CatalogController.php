<?php

namespace app\controllers;

use yii\web\Controller;

/**
* 
*/
class CatalogController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionCategory($alias)
  {
    return $this->render('category');
  }

  public function actionProduct($alias)
  {
    return $this->render('product');
  }

}

/**/