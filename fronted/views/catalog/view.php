<?php

// catalog/view

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\fronted\widgets\ProductListWidget;

$category = ArrayHelper::getValue($model, 'category', '');
$categoryParent = ArrayHelper::getValue($model, 'category.parent', false);

$this->title = '@'.$model->alias;
$this->params['breadcrumbs'][] = ['label'=>$categoryParent->name, 'url'=>[$categoryParent->route]];
$this->params['breadcrumbs'][] = ['label'=>$category->name, 'url'=>[$category->route, 'alias'=>$category->alias]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content mb-auto">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-sm-4 col-lg-3">
          <img class="<?= $model->imgAttrClass ?>" src="<?= $model->img ?>">
        </div><!--/.col-->
        <div class="col-12 col-sm-8 col-lg-9">
          <h1 class="card-view-title"><?= Html::decode($model->name) ?></h1>
          <p class="card-text">Адрес канала: <a target="_blank" href="<?= $model->url ?>">@<?= $model->alias ?></a></p>
          <p class="card-text"> Категории:
            <?php foreach ($model->tags as $tag): ?>
              <span class="text-secondary">
                <?= $tag->name ?>
              </span>
            <?php endforeach ?>
          </p>
          <p class="card-text">Подписчики: <span class="text-secondary"><?= $model->members ?></span></p>
          <div class="star my-3">
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item active"></i>
            <i class="fas fa-star star-item"></i>
            <i class="fas fa-star star-item"></i>
          </div>
          <p class="card-text">
            <a class="btn btn-outline-default" target="_blank" href="<?= $model->url ?>">
              <i class="fab fa-telegram-plane"></i> Подписаться
            </a>
          </p>
          <?php if ($model->desc): ?>
            <h3 class="card-title my-3">Описание канала:</h3>
            <p class="card-text my-3"><?= Html::decode($model->desc) ?></p>
          <?php endif ?>
        </div><!--/.col-->
      </div><!--/.row-->
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section">
    <div class="container">
      <?php if ($stickers = $model->stickers): ?>
        <div class="row justify-content-center align-items-center">
          <?php foreach ($stickers as $sticker): ?>
            <?= $this->render('-view-list-'.$model->type, ['sticker'=>$sticker]) ?>
          <?php endforeach; ?>
        </div><!--/.row-->
      <?php endif; ?>
    </div><!--/.container-->
  </section><!--/.section-->

  <?php if ($like = $model->like): ?>
  <section class="section bg-gray">
    <div class="container">
      <h2 class="section-title">Похожие каналы:</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $like,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->
  <?php endif ?>
  <div class="container">
    <div class="my-3">

<div id="hypercomments_widget"></div>
<script type="text/javascript">
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Stream", widget_id: 103188});
(function() {
if("HC_LOAD_INIT" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/103188/"+lang+"/widget.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>

    </div>
  </div><!--/.container-->
</div><!--/.content-->