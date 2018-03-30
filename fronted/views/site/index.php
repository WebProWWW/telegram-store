<?php

// site/index

/* @var $this yii\web\View */
/* @var $modelProduct */
/* @var $category */

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\fronted\widgets\ProductListWidget;
use app\fronted\widgets\BestProductsWidget;

ArrayHelper::setValue($this->params, 'category', $category);


$this->title = $category->name;

?>
<div class="content">

  <section class="section">
    <div class="container">
      <img class="d-block mx-auto my-3" width="135" height="135" src="/img/logo.svg">
      <h1 class="h2 text-center my-0">Telegram</h1>
      <p class="text-center my-0">Новая эра общения</p>
      <p class="text-center my-3">
        <a class="logo" href="<?= Url::to(['site/index']) ?>">
          <img class="logo-img" width="25" height="25" src="/img/logo.svg">
          <span class="logo-text">Telegram Store</span>
        </a>
        - самый большой каталог телеграмм ботов, стикеров, игр и каналов.
      </p>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray border-bottom">
    <div class="container">
      <h2 class="section-title">Популярные каналы</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $modelProduct->bestChannels,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray border-bottom">
    <div class="container">
      <h2 class="section-title">Лучшие боты</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $modelProduct->bestBots,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray border-bottom">
    <div class="container">
      <h2 class="section-title">Красивые стикеры</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $modelProduct->bestStickers,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->

</div><!--/.content-->