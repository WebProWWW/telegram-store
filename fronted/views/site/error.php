<?php

/* @var $name string */
/* @var $message string */
/* @var $exeption yii\web\NotFoundHttpException */

use yii\helpers\Url;

$this->title = '404';

?>
<div class="content my-auto">
  <div class="container">
    <a href="<?= Url::to(['site/index']) ?>">
      <img class="d-block mx-auto my-3" width="135" height="135" src="/img/logo.svg">
    </a>
    <h3 class="text-center my-3">404 - Страница не найдена</h3>
    <p class="text-center my-3">Попробуйте воспользоваться поиском:</p>
    <?php if (YII_DEBUG): ?>
      <p class="text-center my-3"><?= $message ?></p>
    <?php endif ?>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <?= $this->render('_form-search', ['model'=>$formModel]) ?>
      </div><!--/.col-12-->
    </div><!--/.row-->
  </div><!--/.container-->
</div><!--/.content-->