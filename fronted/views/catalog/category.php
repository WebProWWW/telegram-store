<?php

/* @var $category */

use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\fronted\widgets\ProductListWidget;

$this->params['breadcrumbs'][] = ['label'=>$category->parent->name, 'url'=>[$category->parent->route]];
$this->params['breadcrumbs'][] = $category->name;

ArrayHelper::setValue($this->params, 'category', $category);

?>
<div class="content mb-auto">
  <section class="section">
    <div class="container">
      <h1 class="page-title"><?= $this->title ?></h1>
      <?= ProductListWidget::widget([
        'dataModels' => $dataProvider->models,
      ]) ?>
      <div class="row justify-content-center mt-3">
        <div class="col-auto">
          <?= LinkPager::widget([
            'pagination'=>$dataProvider->pagination,
            'activePageCssClass'=>'active',
            'linkContainerOptions'=>['class'=>'page-item'],
            'linkOptions'=>['class'=>'page-link'],
            'disableCurrentPageButton'=>true,
            'disabledListItemSubTagOptions'=>['tag'=>'span', 'class'=>'page-link'],
            'maxButtonCount'=>6,
          ]) ?>
        </div><!--/.col-->
      </div><!--/.row-->
    </div><!--/.container-->
  </section><!--/.section-->
</div><!--/.content-->