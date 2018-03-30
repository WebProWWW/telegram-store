<?php

/* @var $product */

use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\Html;

?>
<div class="col-12 col-md-6 col-xl-4 align-self-stretch my-3">
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-3">
          <img class="card-image circle" width="320" height="320" src="<?= $product->img ?>">
        </div><!--/.col-->
        <div class="col-9">
          <h6 class="card-subtitle">
            <?php foreach ($product->tags as $tag): ?>
            <span><?= $tag->name ?></span>
            <?php endforeach ?>
          </h6>
          <h5 class="card-title"><?= Html::decode($product->name) ?></h5>
        </div><!--/.col-->
      </div><!--/.row-->
      <p class="card-text"><?= StringHelper::truncate(Html::decode($product->desc), 100) ?></p>
    </div>
    <div class="card-footer bg-transparent">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <div class="star">
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item"></i>
            <i class="fas fa-star star-item"></i>
          </div>
        </div><!--/.col-->
        <div class="col-auto">
          <a class="btn btn-outline-default" href="<?= Url::to([
            'catalog/view',
            'category'=>$product->category->alias,
            'alias'=>$product->alias,
          ]) ?>">
            <!-- <i class="fab fa-telegram-plane"></i> -->
            Подробнее
          </a>
        </div><!--/.col-->
      </div><!--/.row-->
    </div><!--/.card-footer-->
  </div><!--/.card-->
</div><!--/.col-->