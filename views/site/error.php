<?php

/* @var $name string */
/* @var $message string */
/* @var $exeption yii\web\NotFoundHttpException */

use yii\helpers\Url;

$this->title = '404';

?>
<div class="container">
  <a href="<?= Url::to(['site/index']) ?>">
    <img class="d-block mx-auto my-3" width="135" height="135" src="/img/logo.svg">
  </a>
  <h3 class="text-center my-3">404 - Страница не найдена</h3>
  <p class="text-center my-3">Попробуйте воспользоваться поиском:</p>
  <form class="form my-3">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Поиск..." aria-label="Поиск">
          <div class="input-group-append">
            <button class="btn btn-outline-default" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div><!--/.col-12-->
    </div><!--/.row-->
  </form>
</div>