<?php
// use yii\helpers\Url;
use yii\helpers\Html;
?>

<?= Html::beginForm(['site/search'], 'post', ['class'=>'form my-3']) ?>
    <div class="input-group">
      <?= Html::activeInput('text', $model, 'word', ['class'=>'form-control', 'placeholder'=>true]) ?>
      <div class="input-group-append">
        <button class="btn btn-outline-default" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </div>
<?= Html::endForm() ?>