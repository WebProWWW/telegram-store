<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

use app\fronted\assets\AppAsset;
use app\fronted\widgets\MainMenu;
use app\fronted\models\Category;

AppAsset::register($this);

$baseUrl = Url::base(true);

$metaKey = ArrayHelper::getValue($this, 'params.meta_key', '');
$metaDesc = ArrayHelper::getValue($this, 'params.meta_desc', '');
$currentCategory = ArrayHelper::getValue($this, 'params.category', false);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <?= Html::csrfMetaTags(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Telegram Store - <?= Html::encode($this->title) ?></title>
  <meta name="keywords" content="<?= $metaKey ?>">
  <meta name="description" content="<?= $metaDesc ?>">
  <?php $this->head(); ?>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= $baseUrl ?>/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= $baseUrl ?>/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= $baseUrl ?>/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= $baseUrl ?>/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= $baseUrl ?>/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= $baseUrl ?>/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= $baseUrl ?>/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= $baseUrl ?>/apple-touch-icon-152x152.png">
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/favicon-196x196.png" sizes="196x196">
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/favicon-128.png" sizes="128x128">
  <meta name="application-name" content="Telegram Store">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="<?= $baseUrl ?>/mstile-144x144.png">
  <meta name="msapplication-square70x70logo" content="<?= $baseUrl ?>/mstile-70x70.png">
  <meta name="msapplication-square150x150logo" content="<?= $baseUrl ?>/mstile-150x150.png">
  <meta name="msapplication-wide310x150logo" content="<?= $baseUrl ?>/mstile-310x150.png">
  <meta name="msapplication-square310x310logo" content="<?= $baseUrl ?>/mstile-310x310.png">
</head>
<body>
<?php $this->beginBody(); ?>

<header class="header fixed-top js-header">
  <div class="container header-container">
    <nav class="navbar navbar-expand-md navbar-white">
      <a class="navbar-brand logo" href="<?= Url::home() ?>">
        <img class="logo-img" width="25" height="25" src="/img/logo.svg">
        <span class="logo-text">Telegram Store</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?= MainMenu::widget(['currentCategory'=>$currentCategory]) ?>
      </div><!--/.navbar-collapse-->
    </nav>
  </div><!--/.container-->
</header>

<div class="h-100 d-flex flex-column justify-content-between">

<div class="page-first-item"></div>

<?php if ($breadcrumbLinks = ArrayHelper::getValue($this->params, 'breadcrumbs', false)): ?>
<nav class="breadcrumb-nav m-0" aria-label="breadcrumb">
  <div class="container">
    <?= Breadcrumbs::widget([
      'tag' => 'ol',
      'itemTemplate' => "<li class=\"breadcrumb-item\">{link}<li>",
      'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}<li>",
      'links' => $breadcrumbLinks,
    ]) ?>
  </div><!--/.container-->
</nav>
<?php endif; ?>

<?php

// var_dump($currentRoute, $currentAlias);
// var_dump(Yii::$app->controller->route);
// var_dump(Yii::$app->controller);
// var_dump(Yii::$app->request->getQueryParam('alias', ''));
?>

<?= $content ?>

<footer class="footer">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-auto">
        <a class="footer-ln" href="<?= Url::base(true) ?>">telegram-store.ru &copy; 2018</a>
        <a class="footer-ln" href="https://t.me/channelsstore" target="_blank">Создатель @channelsstore</a>
        <a class="footer-ln" href="https://t.me/channelsstore" target="_blank">Мы в телеграм <i class="fab fa-telegram-plane"></i></a>
      </div><!--/.col-->
      <div class="col-auto">
        <nav class="footer-nav">
          <a class="footer-nav-ln" href="<?= Url::to(['site/index']) ?>">Главная</a>
          <a class="footer-nav-ln" href="">Регистрация в Telegram</a>
          <a class="footer-nav-ln" href="">FAQ</a>
          <div class="dropdown">
            <a class="footer-nav-ln dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Скачать телеграм</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= Url::to(['download/index']) ?>">Для всех платформ</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для macOS</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для Windows</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для iPhone / iPad</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для Android</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для Windows Phone</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Дистрибутивы</a>
            </div>
          </div><!--/.dropdown-->
        </nav>
        <nav class="footer-nav">
          <a class="footer-nav-ln" href="<?= Url::to(['site/view', 'alias'=>'politika-konfidentsialnosti']) ?>">Политика конфиденциальности</a>
        </nav>
      </div><!--/.col-->
    </div><!--/.row-->
  </div><!--/.container-->
</footer>

</div><!--/.h-100.d-flex-->

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
