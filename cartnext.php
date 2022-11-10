<?php
    //Connecting the header
    require_once("header.php");
?>
<!-- Message displaying block -->
<div class="block_for_messages">
    <?php
 
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //deleting so that it doesn't appear again when the page is refreshed
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //deleting so that it doesn't appear again when the page is refreshed
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
<?php
    //Check if the user is authorized
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
 <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">

                    <!--Warning need to authorization--> 
                    <div class="section-intro pb-60px">
          <p></p>
          <h2>Для оформления заказа вам необходимо зайти </h2> <br>
          <h2>в уже существующий аккаунт или <span class="section-intro__style">создать новый</span></h2>
        </div>
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

    <!--Linking to registration form-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4>Впервые на нашем сайте?</h4>
                            <p>Зарегистрировавшись в нашем сайте, можете заказать товары доставкой на дом!</p>
                            <a class="button button-account" href="registration.php">Создать аккаунт</a>
                        </div>
                    </div>
                </div>

                <!--Authorization form-->
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Вход в личный кабинет</h3>
                        <form class="row login_form" method="post" name="form_auth" action="auth.php" id="form_auth" >
                            <!--Email field-->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'" required="required"> 
                                <span id="valid_email_message" class="mesage_error"></span>
                            </div>
                            <!--Password field-->
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" name="password" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required="required">
                                <span id="valid_password_message" class="mesage_error"></span>
                            </div>
                            <!--Captcha field-->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="captcha" placeholder="Введите капчу" onfocus="this.placeholder = ''" onblur="this.placeholder = 'captcha'" required="required">
                                <img src="captcha.php" alt="Изображение капчи" /> <br>
                            </div>
                            <!--Submit button-->
                            <div class="col-md-12 form-group">
                                <button type="submit" name="btn_submit_auth" value="submit" class="button button-login w-100">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php

//if the user is authorized, display order detail's input form
    }else{
?>
    <div id="authorized">
        <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        </head>
        <body data-page="order">
    <div class="container">
        <div id="order-message" class="alert alert-info"></div>
        <br />
           <form id="order-form" class="form-horizontal" role="form">
            <!--Name field-->
            <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">Ваше имя *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input-name" name="name" placeholder="Ваше имя">
                </div>
            </div>
            <!--Email field-->
            <div class="form-group">
                <label for="input-email" class="col-sm-2 control-label">Email *</label>
                <div class="col-sm-6">
                    <input type="email"  value="<?php echo $_SESSION["email"]; ?>" class="form-control" id="input-email" name="email" readonly>
                </div>
            </div>
            <!--Phone field-->
            <div class="form-group">
                <label for="input-phone" class="col-sm-2 control-label">Телефон *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input-phone" name="phone" placeholder="Телефон">
                </div>
            </div>
            <!--Delivery type options-->
            <div class="form-group">
                <label class="col-sm-2 control-label">Способ доставки *</label>
                <div class="col-sm-6">
                    <input type="hidden" name="delivery_type" id="delivery-type" value="" />
                    <input type="hidden" name="delivery_summa" id="delivery-summa" value="0" />
                    <input type="hidden" name="full_summa" id="full-summa" value="0" />
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="Free" data-summa="0" checked>Бесплатная доставка (30-50 дней) </label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="EMS" data-summa="1000">EMS (10-20 дней) : 1000 тг</label>
                    </div>
                    
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="DHL" data-summa="2000">Службой DHL (4-7 дней) : 2000 тг</label>
                    </div>
                    <br />
                    <div id="alert-delivery" class="alert alert-info"></div>
                </div>
            </div>
            <!--Address field-->
            <div class="form-group">
                <label for="input-address" class="col-sm-2 control-label">Адрес доставки *</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="input-address" name="address" placeholder="Адрес доставки" row="3"></textarea>
                </div>
            </div>
            <!--Additional message field-->
            <div class="form-group">
                <label for="input-message" class="col-sm-2 control-label">Сообщение</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="input-message" name="message" placeholder="Дополнительная информация" row="3"></textarea>
                    <br />
                    <!--if required fields are blank, display error message-->
                    <div id="alert-validation" class="alert alert-danger hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Ошибка!</strong> Заполните обязательные поля, отмеченные *
                    </div>
                    <!--if input data is successfully send to database, display success message-->
                    <div id="alert-order-done" class="alert alert-success hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Спасибо за заказ!</strong> Скоро мы с Вами свяжемся
                    </div>
                </div>
            </div>
            <!--Submitting input data-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button id="order-btn" type="submit" class="btn btn-primary">Отправить заказ</button>
                </div>
            </div>
        </form>
    </div>
</body>
<!--displaying final cost and order detail's form instuction-->
<script id="order-message-template" type="text/template">
        <% if (count !== 0) { %>
            
            Заполните форму ниже и нажмите кнопку Отправить заказ. Оплата наличными при получении товара.
        <% } else { %>
            Ваша корзина пуста. Перед отправкой заказа добавьте в корзину хотя бы один товар.
        <% } %>
    </script>
    </div>
<?php
    }
?>
<?php
    //Connecting the footer
    require_once("footer.php");
?>