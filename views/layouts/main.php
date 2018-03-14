<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <?= Html::csrfMetaTags(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Telegram Store - <?= Html::encode($this->title) ?></title>
  <?php $this->head(); ?>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= Url::base(true) ?>/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= Url::base(true) ?>/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= Url::base(true) ?>/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= Url::base(true) ?>/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= Url::base(true) ?>/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= Url::base(true) ?>/apple-touch-icon-152x152.png">
  <link rel="icon" type="image/png" href="<?= Url::base(true) ?>/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?= Url::base(true) ?>/favicon-16x16.png" sizes="16x16">
  <meta name="application-name" content="Telegram Store">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="<?= Url::base(true) ?>/mstile-144x144.png">
</head>
<body>
<?php $this->beginBody(); ?>

<?php
// Yii::$app->request->getReferrer()
// echo dump(Url::base(true));
?>

<header class="header fixed-top js-header">
  <div class="container header-container">
    <nav class="navbar navbar-expand-md navbar-white">
      <a class="navbar-brand logo" href="<?= Url::to(['site/index']) ?>">
        <img class="logo-img" width="25" height="25" src="/img/logo.svg">
        <span class="logo-text">Telegram Store</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Каталог</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= Url::to(['catalog/index']) ?>">Весь каталог</a>
              <a class="dropdown-item active" href="<?= Url::to(['catalog/category', 'alias'=>'boty']) ?>">Боты</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'stikery']) ?>">Стикеры</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'igry']) ?>">Игры</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'kanaly']) ?>">Каналы</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'chaty']) ?>">Чаты</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'maski']) ?>">Маски</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'temy']) ?>">Темы</a>
              <a class="dropdown-item" href="<?= Url::to(['catalog/category', 'alias'=>'maski']) ?>">Маски</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= Url::to(['catalog/index']) ?>">Телеграм Web</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Скачать</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= Url::to(['download/index']) ?>">Для всех платформ</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для macOS</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для Windows</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для iPhone / iPad</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для Android</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Для Windows Phone</a>
              <a class="dropdown-item" href="<?= Url::to(['download/platform', 'alias'=>'']) ?>">Дистрибутивы</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= Url::to(['catalog/index']) ?>">Блог</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= Url::to(['catalog/index']) ?>"><i class="fas fa-search"></i></a>
          </li>
        </ul>
        <a class="btn btn-outline-default my-2 my-md-0 ml-md-2" href="/"><i class="fas fa-sign-in-alt"></i> Войти</a>
      </div>
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
<?php endif ?>


<div class="content my-auto">
  <?= $content ?>
</div><!--/.content-->

<footer class="footer">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-auto">
        <a class="footer-ln" href="<?= Url::base(true) ?>">telegram-store.ru &copy; 2018</a>
        <a class="footer-ln" href="https://t.me/Timur8484" target="_blank">Создатель @Timur8484</a>
        <a class="footer-ln" href="https://t.me/Timur8484" target="_blank">Мы в телеграм <i class="fab fa-telegram-plane"></i></a>
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
          <a class="footer-nav-ln" href="">Политика конфиденциальности</a>
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