<?php

/* @var $name string */
/* @var $message string */
/* @var $exeption yii\web\NotFoundHttpException */

use yii\helpers\Url;

$this->title = 'Разработка';

?>
<div class="content my-auto">
  <div class="container">
    <a href="<?= Url::to(['site/index']) ?>">
      <img class="d-block mx-auto my-3" width="160" height="160" src="/img/dev.gif">
    </a>
    <h3 class="text-center my-3">Страница в разработке</h3>
    <p class="text-center my-3 lead">Данный момент, мы для Вас готовим интересный контент.<br>В скором времени страница будет доступна</p>
  </div><!--/.container-->
</div><!--/.content-->