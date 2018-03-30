<?php

// blog/index

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;

ArrayHelper::setValue($this->params, 'category', $category);

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content mb-auto">
  <section class="section">
    <div class="container">
      <h1 class="page-title"><?= $this->title ?></h1>
      <?php if ($dataProvider): ?>
        <?php foreach ($dataProvider->models as $model): ?>
          <?php $url = Url::to(['blog/view', 'alias'=>$model->alias]); ?>
          <div class="media align-items-center my-4">
            <a href="<?= $url ?>">
              <img class="mr-3 rounded-circle" width="110" height="110" src="<?= $model->img ?>">
            </a>
            <div class="media-body">
              <h6 class="mt-0"><a href="<?= $url ?>"><?= Html::decode($model->title) ?></a></h6>
              <?= StringHelper::truncate(Html::decode($model->desc), 200) ?>
              <br>
              <a href="<?= $url ?>">Читать полностью</a>
            </div>
          </div>
        <?php endforeach ?>
        <div class="row justify-content-center">
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
      <?php endif; ?>
    </div><!--/.container-->
  </section><!--/.section-->
</div><!--/.content-->