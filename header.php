<?php
    //Starting the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                "use strict";
                //================ Checking email ==================
                //regex to validate email
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=email]');
                mail.blur(function(){
                    if(mail.val() != ''){
                        // Checking if the entered email matches the regular expression
                        if(mail.val().search(pattern) == 0){
                            // Removing the error message
                            $('#valid_email_message').text('');
                            //Activating the submit button
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                            //Displaying error message
                            $('#valid_email_message').text('Неправильный Email');
                            // Deactivating the submit button
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                        $('#valid_email_message').text('Введите Ваш email');
                    }
                });                //================ Password length check ==================
                var password = $('input[name=password]');
                password.blur(function(){
                    if(password.val() != ''){
                        //If the length of the entered password is less than six characters, then we display an error message
                        if(password.val().length < 6){
                            //error message
                            $('#valid_password_message').text('Минимальная длина пароля 6 символов');
                            // Deactivating the submit button
                            $('input[type=submit]').attr('disabled', true);
                        }else{
                            // Removing the error message
                            $('#valid_password_message').text('');
                            //Activating the submit button
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                        $('#valid_password_message').text('Введите пароль');
                    }
                });
            });
        </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Күміс ана</title>
  <!--linking external css and script sources-->
   <link rel="icon" href="img/логотип.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link href="components/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
  <!--================ Start Header Menu Area =================-->
    <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/логотип.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--menus-->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto Smr-auto">
              <li class="nav-item"><a class="nav-link" href="index.php">Главная</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Товары</a>
                  <!--Submenu-->
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="catalogue.php">Каталог товаров</a></li>
                  <li class="nav-item"><a class="nav-link" href="pricelist.php">Прайс-лист</a></li>
            </ul>
          </li>
              <li class="nav-item"><a href="service.php" class="nav-link">Услуги</a></li>
              <li class="nav-item"><a href="gallery.php" class="nav-link">Галерея</a></li>
              <li class="nav-item"><a href="komment.php" class="nav-link">Отзывы</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">О нас</a>
                  <!--Submenu-->
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                  <li class="nav-item"><a class="nav-link" href="contact.php">Контакты</a></li>
            </ul>
          </li>
            </ul>
            <ul class="nav-shop">              
              <li class="nav-item" ><button><a class="ti-shopping-cart" href="cart.php"></a></button></li>
            </ul>
              <div id="auth_block">
            <?php
                //Checking if the user is authorized
                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                    // if not, displaying button going to authorization page
            ?>
                    <div class="nav-item"><a class="button button-header" href="form_auth.php">Вход</a></div>
            <?php
                }else{
                    //if the user is authorized, displaying user email and profile details
            ?> 
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false"><?php echo $_SESSION["email"]; ?></a>
                <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link" href="myorders.php">Мои заказы</a></li>
          <li class="nav-item"><a class="nav-link" href="mycomments.php">Мои отзывы</a></li>
          <li class="nav-item"><a class="nav-link" href="myrequests.php">Мои заявки</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>
                </ul>
              </li>
            <?php
                }
            ?>
            </div>
             <div class="clear"></div>
            </div>
        </div>
      </nav>
    </div>
  </header>