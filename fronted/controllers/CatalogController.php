<?php

namespace app\fronted\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

use app\fronted\models\Product;
use app\fronted\models\Category;

use app\fronted\components\DevelopmentException;

/**
* 
*/
class CatalogController extends Controller
{

  public function actionIndex()
  {
    $category = Category::findByRoutAlias('catalog/index', 'katalog');
    if (!$category) throw new DevelopmentException;
    return $this->render('index', ['category'=>$category]);
  }

  public function actionView($category=null, $alias=null)
  {
    $model = Product::findByAlias($alias);
    return $this->render('view', ['model'=>$model]);
  }

  public function actionCategory($alias=null, $page=1)
  {
    $category = Category::findByRoutAlias('catalog/category', $alias);
    if (!$category) throw new NotFoundHttpException;
    $product = new Product;
    $dataProvider = $product->search([
      'category_id'=>$category->id,
      'alias'=>$category->alias,
      'page' => $page,
    ]);
    return $this->render('category', [
      'dataProvider'=>$dataProvider,
      'category'=>$category,
    ]);
  }

  public function actionCreate()
  {
    throw new DevelopmentException;
  }

}

/**/