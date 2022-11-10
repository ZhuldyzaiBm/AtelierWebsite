<?php
    //Connecting the header
    include_once("header.php");
?>
  <!-- ================ banner area ================= --> 
  <section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>Услуги</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

 <!-- ================ service introduction are ================= --> 
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row"> 
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">

              <!-- Service 1: Individual tailoring--> 
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/cart/1.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><h5 class="card-product__title">Индивидуальный пошив</h5></li>
                    </ul>
                  </div>
                  <!-- Description --> 
                  <div class="card-body">
                    <p>Не бывает плохих фигур, бывает неподходящая одежда. Заказав индивидуальный пошив платья или юбки, Вы увидите, как может преобразить идеально сидящая вещь. Индивидуальный пошив женской и мужской одежды подразумевает весь комплекс услуг, от снятия мерок до примерки готового изделия.</p>
                  </div>
                </div>
              </div>

              <!-- Service 2: Corporate uniform for staff-->
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/cart/2.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><h5 class="card-product__title">Корпоративная униформа для персонала</h5></li>
                    </ul>
                  </div>
                  <!-- Description -->
                  <div class="card-body">
                    <p>Красивая, отлично скроенная, подчеркивающая Ваши достоинства корпоративная одежда, дарит уверенность в работе каждый день. Мы уверены в профессионализме наших мастеров и даже сложный и трудоемкий пошив промо формы на заказ, по индивидуальным лекало- для нас не проблема. Закажите пошив униформы для продавцов, официантов, пошив одежды для персонала любого уровня в нашем ателье - и Ваши сотрудники станут лицом Вашего растущего бизнеса!</p>
                  </div>
                </div>
              </div>

              <!-- Service 2: Sewing curtains-->
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/cart/3.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><h5 class="card-product__title">Пошив штор</h5></li>
                    </ul>
                  </div>
                  <!-- Description -->
                  <div class="card-body">
                    <p>Интернет-магазин штор найти легко, забив в поисковой строке «купить шторы в Москве». Однако, все шторы в магазинах стандартные. А ведь порой даже один-два оттенка могут сыграть решающую роль в вопросе подойдут ли новые шторы к вашему интерьеру. Поэтому пошив штор на заказ является отличной альтернативой покупке готовых. Вид ткани для пошива штор Вы можете выбрать абсолютно любой, ведь наши мастера работают с любыми материалами.</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php
   //Check if the user is authorized
   if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
   // If not, then ask to authorize
?>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Оставить заявку на шитье</button>
      <div id="id01" class="modal">
        <form class="modal-content animate" action="" method="post">
          <div class="container">
            <h2>Необходимо авторизоваться</h2>
          </div>
        </form>
      </div>

<?php
}else{
?>

<!-- If authorized, display request input form -->
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Оставить заявку на шитье</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="popup_action.php" method="post">
    <div class="container">
      <!--email field-->
      <input type="text" name="email" value="<?php echo $_SESSION["email"]; ?>" readonly>
      <!--name field-->
      <input type="text" placeholder="Имя" name="name" required>
      <!--description field-->
      <input type="text" placeholder="Описание работы" name="work" required>
      <!--phone number field-->
      <input type="text" placeholder="Телефонный номер" name="phone" required>
      <!--submit button-->
      <button type="submit">Отправить</button>  
    </div>
  </form>
</div>
<?php
}
?>
<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
</div>
</section>
  <?php
    //Connecting the footer
    require_once("footer.php");
?>