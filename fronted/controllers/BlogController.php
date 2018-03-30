<?php

namespace app\fronted\controllers;

use Yii;
use yii\web\Controller;
use app\fronted\models\Blog;
use app\fronted\models\Category;

/**
* 
*/
class BlogController extends Controller
{

  public function actionIndex($page=1)
  {
    $model = new Blog();
    $category = Category::findByRoutAlias('blog/index', 'blog');
    // $dataProvider = $model->search(Yii::$app->request->queryParams);
    $dataProvider = $model->search(['page'=>$page]);

    return $this->render('index', [
        // 'model' => $model,
        'dataProvider' => $dataProvider,
        'category' => $category,
    ]);
  }

  public function actionView($alias=null)
  {
    $model = Blog::findByAlias($alias);
    return $this->render('view', ['model'=>$model]);
  }

}

/**/