<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\fronted\widgets\ProductListWidget;
use app\fronted\models\Product;

$this->title = $category->name;
$this->params['breadcrumbs'][] = $this->title;
ArrayHelper::setValue($this->params, 'category', $category);

$modelProduct = new Product;

?>
<div class="content mb-auto">
  <section class="section">
    <div class="container">
      <h1 class="page-title"><?= $this->title ?></h1>
      <nav class="inav">
        <?php if ($categoryChilds = $category->childs): ?>
          <?php foreach ($categoryChilds as $child): ?>
            <?php if ($child->show): ?>
              <a class="inav-link" href="<?= Url::to(['catalog/category', 'alias'=>$child->alias]) ?>">
                <i class="inav-icon <?= $child->icon ?>"></i>
                <span class="inav-label"><?= $child->name ?></span>
                <span class="inav-count"><?php //= $child->count ?></span>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </nav>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray border-bottom">
    <div class="container">
      <h2 class="section-title">Популярные каналы</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $modelProduct->bestChannels,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray border-bottom">
    <div class="container">
      <h2 class="section-title">Лучшие боты</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $modelProduct->bestBots,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray border-bottom">
    <div class="container">
      <h2 class="section-title">Красивые стикеры</h2>
      <?= ProductListWidget::widget([
        'dataModels' => $modelProduct->bestStickers,
      ]) ?>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray">
    <div class="container">
      <h1 class="page-title">Каталог Телеграмм контента: каналы, групповые чаты, стикеры</h1>
      <p>Кроссплатформенный мессенджер для мобильных устройств и персональных компьютеров предлагает пользователям широкие функциональные возможности для общения, разработок и повышения своего образовательного уровня. На сегодняшний день каталог Телеграмм включает: разнообразные тематические каналы, в которых публикуется познавательная информация; групповые сообщества, где можно найти собеседников со схожими взглядами и жизненной позицией; уникальные стикеры, позволяющие сделать общение более ярким и увлекательным.</p>
      <h2 class="page-title">Самые интересные и познавательные каналы</h2>
      <p>Каналы пришли на смену спискам рассылки и практически сразу стали пользоваться большой популярностью у компаний, различных сообществ и блогеров, так как появилась возможность публиковать статьи, новости, собственные мысли, ссылки на продукты и рассылать их неограниченному числу подписчиков. Особенностью такого инструмента является отсутствие комментариев в ленте, поэтому посетители не отвлекаются на постороннюю информацию, изучая только полезный контент.</p>
      <p>На данный момент в каталоге Телеграмм находится более 1500 тематических пабликов, которые условно можно поделить на несколько категорий:</p>
      <p>
        <ul>
          <li>новости, СМИ;</li>
          <li>технологии;</li>
          <li>авторские блоги;</li>
          <li>юмор, развлечения;</li>
          <li>видео, музыка;</li>
          <li>бизнес, маркетинг;</li>
          <li>наука, образование;</li>
          <li>товары, услуги;</li>
          <li>спорт и др.</li>
        </ul>
      </p>
      <p>Чтобы стать подписчиком полюбившегося паблика, необходимо открыть его в мессенджере и нажать кнопку «Присоединиться». Подписка позволяет получать push-уведомления о свежих записях и, таким образом, всегда находиться в курсе последних событий.</p>
      <h3 class="page-title">Уникальный каталог Телеграмм групп</h3>
      <p>Telegram – это прежде всего сервис для быстрой передачи сообщений, где пользователи, помимо обычных писем, могут обмениваться разнообразным мультимедийным контентом. Основным достоинством групповых чатов является возможность одновременно переписываться с большим количеством людей, которые объединились в одно сообщество с учетом своих интересов или профессиональных навыков. Так, например, существуют группы для IT-специалистов, поклонников кинематографа, представителей бизнеса, людей искусства и просто любителей пообщаться на свободные темы.</p>
      <p>В зависимости от популярности выбранной тематики, количество участников группового чата может варьироваться от нескольких десятков до нескольких тысяч пользователей. Самыми многочисленными в мессенджере считаются группы, в которых обсуждаются уникальные разработки и новости из сферы информационных технологий, также достаточно популярными являются юмористические сообщества, где люди делятся различными мемами или смешными историями из реальной жизни.</p>
      <p>
      <h3 class="page-title">Пользовательские стикерпаки</h3>
      <p>Стикеры – это современный инструмент для общения. С их помощью можно не только украсить диалог, но и послать конкретный сигнал собеседнику, когда все подходящие слова уже закончились. В отличие от обычных смайлов, стикеры обладают более крупными размерами и качественной прорисовкой, поэтому зачастую позволяют лучше передать эмоциональную составляющую во время переписки.</p>
      <p>Одной из уникальных особенностей Telegram является возможность создавать пользовательские стикерпаки и добавлять их в общий каталог, чем активно пользуются отечественные и зарубежные художники. В данном мессенджере собрана одна из самых объемных коллекций интернет-наклеек, а самое главное, что все они абсолютно бесплатны.</p>
    </div><!--/.container-->
  </section><!--/.section-->
  <section class="section">
    <div class="container">
      <h3 class="page-title">Предложка</h3>
      <p>Оставляйте свои каналы, чаты, боты, стикеры и т.д. с коротким описанием, чтобы попасть к нам в каталог. Правила:</p>
      <p>
        <ul>
          <li>На первом уровне только сообщения с вашими каналами, чатами, ботами, стикерами и т.д.</li>
          <li>Обязательна ссылка на канал, чат, бот, стикер и т.д. вида https://t.me/название</li>
          <li>Повторная отправка минимум через 6 часов</li>
          <li>Прикрепите одну картинку, чтобы привлечь внимание к вашему каналу, чату, боту, стикерам и т.д.</li>
        </ul>
      </p>
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
  </section><!--/.section-->
</div><!--/.content-->