<?php

namespace app\fronted\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
// use yii\base\ViewNotFoundException;
use app\fronted\components\DevelopmentException;
use app\fronted\models\Category;
use app\fronted\models\Product;
use app\fronted\models\SearchForm;
use app\fronted\models\Page;


class SiteController extends Controller
{

  // public function beforeAction()
  // {
  // }

  // public function actions()
  // {
  //   return [
  //     'error' => [
  //       'class' => 'yii\web\ErrorAction',
  //     ],
  //   ];
  // }

  public function actionIndex()
  {
    $category = Category::findByRoutAlias('site/index', '');
    $modelProduct = new Product();
    return $this->render('index',[
      'category' => $category,
      'modelProduct' => $modelProduct,
    ]);
  }


  public function actionSearch($page=1)
  {
    $formModel = new SearchForm();
    $request = Yii::$app->request;
    $slovo = $request->get('slovo', false);
    $dataProvider = false;
    if ($request->isPost) {
      $formModel->load($request->post());
    } elseif ($slovo) {
      $formModel->word = $slovo;
    }
    if ($formModel->validate()) {
      $dataProvider = $formModel->search(['page'=>$page]);
    }
    return $this->render('search', [
      'formModel' => $formModel,
      'result' => $dataProvider,
    ]);
  }

  public function actionError()
  {
    $formModel = new SearchForm();
    $exeption = new NotFoundHttpException();
    return $this->render('error', [
      'exeption' => $exeption,
      'formModel' => $formModel,
    ]);
  }

  public function actionView($alias=null)
  {
    $model = Page::findByAlias($alias);
    if (!$model) throw new DevelopmentException;
    return $this->render('view', ['model'=>$model]);
  }

  public function actionDev()
  {
    return $this->render('dev.php');
  }

  public function actionTest()
  {
    return $this->render('test');
  }

  // public function actionDownload($alias)
  // {
  //   return $this->render('catalog');
  // }

  // public function actionCatalog($alias)
  // {
  //   return $this->render('catalog');
  // }

  // public function actionBlog($alias)
  // {
  //   return $this->render('catalog');
  // }

  // public function actionView($alias)
  // {
  //   try {
  //     return $this->render($alias);
  //   } catch (ViewNotFoundException $e) {
  //     throw new NotFoundHttpException($e->getName());
  //   }
    
  // }

  // // private function getCategory($alias)
  // // {
  // //   $category = Category::findByAlias($alias);
  // //   if ($category) {
  // //     $this->view->params['category'] = $category;
  // //     return $category;
  // //   }
  // //   throw new NotFoundHttpException("Category Not Found", 1);
  // //   return false;
  // // }

}
