<?php

// blog/view

use yii\helpers\Html;

$category = $model->category;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>$category->name, 'url'=>[$category->route]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content mb-auto">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-md-3 col-lg-3">
          <img class="img-fluid mx-auto d-block" width="320" height="320" src="<?= $model->img ?>">
        </div><!--/.col-->
        <div class="col-12 col-md-9 col-lg-9">
          <h1 class="card-view-title"><?= $this->title ?></h1>
          <div class="my-3">
            <?= $model->content ?>
          </div>
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
        </div><!--/.col-->
      </div><!--/.row-->
    </div><!--/.container-->
  </section><!--/.section-->
</div><!--/.content-->