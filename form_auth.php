<?php
    //Connecting the header
    require_once("header.php");
?>
<!-- Block for displaying the messages -->
<div class="block_for_messages">
    <?php
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
            //remove it so that it does not appear again when the page is refreshed
            unset($_SESSION["error_messages"]);
        }
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            //remove it so that it does not appear again when the page is refreshed
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
<?php
    //check if the user is not authorized, then we display the authorization form, 
    //otherwise, display a message stating that he is already authorized
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4>Впервые на нашем сайте?</h4>
                            <p>Зарегистрировавшись в нашем сайте, можете заказать товары доставкой на дом!</p>
                            <!-- addressing to registration form -->
                            <a class="button button-account" href="registration.php">Создать аккаунт</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Вход в личный кабинет</h3>
                        <form class="row login_form" method="post" name="form_auth" action="auth.php" id="form_auth" >
                            <!-- Email field -->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'" required="required"> 
                                <span id="valid_email_message" class="mesage_error"></span>
                            </div>
                            <!-- Password field -->
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" name="password" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required="required">
                                <span id="valid_password_message" class="mesage_error"></span>
                            </div>
                            <!-- Captcha field -->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="captcha" placeholder="Введите капчу" onfocus="this.placeholder = ''" onblur="this.placeholder = 'captcha'" required="required">
                                <img src="captcha.php" alt="Изображение капчи" /> <br>
                            </div>
                            <!-- Submitting button -->
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
    }else{
?>
    <div id="authorized">
        <h2>Вы уже авторизованы</h2>
    </div>
<?php
    }
?>
<?php
    //Connecting the footer
    require_once("footer.php");
?>