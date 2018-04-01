<?php

$this->title = $model->title;
// TO DO
// if ($category = $model->category) {
//   // $this->params['breadcrumbs'][] = $this->title;
// }
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content mb-auto">
  <div class="container">
    <h1 class="page-title"><?= $this->title ?></h1>
  </div><!--/.container-->
  <?= $model->content ?>
</div><!--/.content-->