<?php

// backend

namespace app\backend\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\backend\models\Parser;

/**
* 
*/
class ParserController extends Controller
{
  public function behaviors()
  {
    return array_merge(parent::behaviors(), [
      'corsFilter' => [
        'class' => \yii\filters\Cors::className(),
        'cors' => [
          'Origin' => ['https://web.telegram.org'],
          // 'Access-Control-Request-Method' => ['*'],//['POST'],
          // // // Allow only POST and PUT methods
          // 'Access-Control-Request-Headers' => ['*'],
          // // // Allow only headers 'X-Wsse'
          // 'Access-Control-Allow-Credentials' => true,
          // // Allow OPTIONS caching
          // 'Access-Control-Max-Age' => 3600,
          // // Allow the X-Pagination-Current-Page header to be exposed to the browser.
          // 'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
        ],
      ],
    ]);
  }

  public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
  }

  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionAjax()
  {
    // Yii::$app->response->format = Response::FORMAT_JSON;
    // return Yii::$app->request->post('imgsrc');
    $parser = new Parser;
    return $parser->saveImages(123);
    // return Parser::saveImages(Yii::$app->request->post('imgsrc'));
  }
}

// $.post('https://telegram-store.loc/admin/parser/ajax', {name:'timur'}, function(data){ console.log(data); });

/**/