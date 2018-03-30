<?php

/* @var app\models\Product[] $modelsArr Array */
/* @var $itemWrapAttrClass */

?>
<div class="row">
  <?php foreach ($modelsArr as $product): ?>
    <?= $this->render('product-list-'.$product->type, ['product'=>$product]) ?>
  <?php endforeach ?>
</div><!--/.row-->