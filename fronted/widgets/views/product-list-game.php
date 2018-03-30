<?php

/* @var $product */

use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\Html;

?>
<div class="col-12 col-sm-6 col-md-4 col-xl-3 align-self-stretch my-3">
  <div class="card">
    <div class="card-body">
      <img class="card-image" src="<?= $product->img ?>">
      <div class="text-center">
        <h6 class="card-subtitle">
          <?php foreach ($product->tags as $tag): ?>
          <span><?= $tag->name ?></span>
          <?php endforeach ?>
        </h6>
        <h5 class="card-title"><?= Html::decode($product->name) ?></h5>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <div class="star">
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item"></i>
            <i class="fas fa-star star-item"></i>
          </div>
        </div><!--/.col-->
      </div><!--/.row-->
    </div>
    <div class="card-footer bg-transparent">
      <div class="row justify-content-center">
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