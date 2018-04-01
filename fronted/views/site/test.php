<?php

$this->title = 'Телеграм Web';
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

  <section class="section pb-0">
    <div class="container">
      <img class="d-block mx-auto img-fluid" width="1074" height="485" src="/img/tweb/cover.jpg">
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section bg-gray">
    <div class="container">
      <div class="row justify-content-between my-3">
        <div class="col-auto"><h3 class="h6"><i class="fas fa-check text-blue"></i> Быстрый</h3></div>
        <div class="col-auto"><h3 class="h6"><i class="fas fa-check text-blue"></i> Защищённый</h3></div>
        <div class="col-auto"><h3 class="h6"><i class="fas fa-check text-blue"></i> Делитесь файлами</h3></div>
        <div class="col-auto"><h3 class="h6"><i class="fas fa-check text-blue"></i> Поддержка YouTube</h3></div>
        <div class="col-auto"><h3 class="h6"><i class="fas fa-check text-blue"></i> Поддержка Twitter</h3></div>
      </div><!--/.row-->
      <hr>
      <div class="text-center">
        <p>Добро пожаловать в онлайн-версию Telegram.</p>
        <p>Webogram – это клиент Telegram на языке JavaScript, работающий во всех современных браузерах.</p>
        <p>Больше не придется переключаться с устройства на устройство, ведя переписку с друзьями и близкими, — пользуйтесь Telegram онлайн через эту веб-версию.</p>
        <a class="btn btn-outline-default btn-lg mx-auto" href="https://telegram.org/dl/webogram">
          <i class="fab fa-telegram-plane"></i>
          Войти в Webogram
        </a>
      </div>
    </div><!--/.container-->
  </section><!--/.section-->

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 text-center">
          <img class="d-block img-fluid rounded my-3 mx-auto shadow-md" width="250" height="250" src="/img/tweb/item-1.jpg">
          <h3 class="h5">Быстрый и мощный</h3>
          <p>Отправляйте сообщения вашим собеседникам и в конференции</p>
        </div><!--/.col-->
        <div class="col-12 col-md-4 text-center">
          <img class="d-block img-fluid rounded my-3 mx-auto shadow-md" width="250" height="250" src="/img/tweb/item-2.jpg">
          <h3 class="h5">Простой обмен файлами</h3>
          <p>Отправляйте любые файлы без ограничения по трафику или количеству файлов</p>
        </div><!--/.col-->
        <div class="col-12 col-md-4 text-center">
          <img class="d-block img-fluid rounded my-3 mx-auto shadow-md" width="250" height="250" src="/img/tweb/item-3.jpg">
          <h3 class="h5">Мощные инструменты</h3>
          <p>Превью фотографий и анимаций в окне чата, поддержка YouTube и многое другое</p>
        </div><!--/.col-->
      </div><!--/.row-->
    </div><!--/.container-->
  </section><!--/.section-->

</div><!--/.content-->