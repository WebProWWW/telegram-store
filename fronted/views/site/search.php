<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content my-auto">
  <section class="section">
    <div class="container">
      <h1 class="page-title text-center"><?= $this->title ?></h1>
      <div class="row justify-content-center">
        <div class="col-12 col-md-6">
          <?= $this->render('_form-search', ['model'=>$formModel]) ?>
        </div><!--/.col-12-->
      </div><!--/.row-->
      <?php if ($result): ?>
        <?php foreach ($result->models as $model): ?>
          <?php $url = Url::to(['catalog/view', 'category'=>$model->category->alias, 'alias'=>$model->alias]); ?>
          <div class="media my-4">
            <a href="<?= $url ?>">
              <img class="mr-3 rounded-circle" width="50" height="50" src="<?= $model->img ?>">
            </a>
            <div class="media-body">
              <h6 class="mt-0"><a href="<?= $url ?>"><?= Html::decode($model->name) ?></a></h6>
              <?= StringHelper::truncate(Html::decode($model->desc), 200) ?>
            </div>
          </div>
        <?php endforeach ?>
        <div class="row justify-content-center">
          <div class="col-auto">
            <?= LinkPager::widget([
              'pagination'=>$result->pagination,
              'activePageCssClass'=>'active',
              'linkContainerOptions'=>['class'=>'page-item'],
              'linkOptions'=>['class'=>'page-link'],
              'disableCurrentPageButton'=>true,
              'disabledListItemSubTagOptions'=>['tag'=>'span', 'class'=>'page-link'],
              'maxButtonCount'=>6,
            ]) ?>
          </div><!--/.col-->
        </div><!--/.row-->
      <?php endif ?>
    </div><!--/.container-->
  </section><!--/.section-->
</div><!--/.content-->