<?php
    //Connecting the header
    include_once("header.php");
?>
  <main class="site-main">
    <!--================ banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/Home/Главная.png" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>У моды две цели - удобство и любовь</h4>
              <h1>Ателье "Күміс ана"</h1>
              <p>Наше ателье предоставляет широкий ассортимент товаров, а также услуги: индивидуальный пошив, реставрация. Мы гарантируем качество!</p>
              <a class="button button-hero" href="pag.php">Купить сейчас</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ banner start =================-->

    <!--================ Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
          <img src="img/home/ткань.png" alt="" class="img-fluid">

          <a href="catalogue.php" class="hero-carousel__slideOverlay">
            <h3>Ткани</h3>
            <p></p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/пуговки.png" alt="" class="img-fluid">
          <a href="catalogue.php" class="hero-carousel__slideOverlay">
            <h3>Швейная фурнитура</h3>
            <p></p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/услуги2.png" alt="" class="img-fluid">
          <a href="service.php" class="hero-carousel__slideOverlay">
            <h3>Услуги</h3>
            <p></p>
          </a>
        </div>
      </div>
    </section>
    <!--================ Carousel end =================-->

    <!-- ================ Offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Скидки до - 50%</h3>
              <h4>Весенняя распродажа</h4>
              <p>Успейте приобрести товар по самой низкой цене!</p>
              <a class="button button--active mt-3 mt-xl-4" href="catalogue.php">Купить сейчас</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ Offer section end ================= --> 

  </main>

  <?php
    //Connecting the footer
    require_once("footer.php");
?>