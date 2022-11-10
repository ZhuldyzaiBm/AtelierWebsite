<?php
    //Connecting the header
    require_once("header.php");
?>
<!-- Block for displaying messages -->
<div class="block_for_messages">
    <?php
        //If there are error messages in the session, then display them
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];            //Remove so that they are not displayed again when the page is refreshed
            unset($_SESSION["error_messages"]);
        }
        //If there are success messages in the sessionm then display them
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            //Remove so that they are not displayed again when the page is refreshed
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
<?php
    //Check if the user is not authorized, then we display the registration form, 
    //otherwise, display a message that it is already registered
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
                <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4>Уже есть аккаунт?</h4>
                            <!--Authorization-->
                            <a class="button button-account" href="login.html">Войти</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
                        <!--registration input form-->
                        <h3>Регистрация</h3>
                        <form class="row login_form" action="register.php" method="post" id="form_register" name="form_register">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="login" name="login" placeholder="Логин" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'" required="required">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required="required">
                                <span id="valid_email_message" class="mesage_error"></span>
              </div>
              <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required="required">
                                 <span id="valid_password_message" class="mesage_error"></span>
              </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Введите капчу" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Captcha'" required="required">
                                <img src="captcha.php" alt="Вывод капчи" />
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-register w-100" name="btn_submit_register" >Зарегистрироваться</button>
                            </div>
                        </form>
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
            <h2>Вы уже зарегистрированы</h2>
        </div>
<?php
    }
    //Connecting the footer
    require_once("footer.php");
?>