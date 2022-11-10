<?php
    //start the session
    session_start();
    //Add a database connection file
    require_once("dbconnect.php");
    //declare a cell to add errors that may occur while processing the form.
    $_SESSION["error_messages"] = '';
    //declare a cell for adding successful messages
    $_SESSION["success_messages"] = '';
    /*
        Check whether the form was submitted, that is, whether the register button was clicked. If yes, then go further, if not, then the user went to this page directly. In this case, we display an error message for him.
    */
    if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])){
        // (1)
        //Checking the received captcha
        //Trim spaces from the beginning and end of the line
        $captcha = trim($_POST["captcha"]);
        if(isset($_POST["captcha"]) && !empty($captcha)){
            //compare the received value with the value from the session.
            if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                // If the captcha is not correct, then we return the user to the registration page, and there we will display an error message that he entered the wrong captcha.
                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Вы ввели неправильную капчу </p>";
                // Save the error message to the session. 
                $_SESSION["error_messages"] = $error_message;
                //Return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/registration.php");
                //Stop the script
                exit();
            }

            // (2)
            // check if there is data sent from the form in the global array $ _POST and enclose the submitted data into the ordinary variables.
            if(isset($_POST["login"])){
                //Trim spaces from the beginning and end of the line
                $login = trim($_POST["login"]);
                //Checking a variable for emptiness
                if(!empty($login)){
                    //For safety, convert special characters to HTML entities
                    $login = htmlspecialchars($login, ENT_QUOTES);
                }else{
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш логин</p>";
                    //Return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/registration.php");
                    //Stop the script
                    exit();
                }
            }else{
                // Save the error message to the session.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с логином</p>";
                //Return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/registration.php");
                //Stop the script
                exit();
            }
            if(isset($_POST["email"])){
                //Trim spaces from the beginning and end of the line
                $email = trim($_POST["email"]);
                if(!empty($email)){
                    $email = htmlspecialchars($email, ENT_QUOTES);
                    // (3) check the format of the postal address and its uniqueness
                    //Checking the format of the received mailing address using a regular expression
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";
                    //If the format of the received email address does not match the regular expression
                    if( !preg_match($reg_email, $email)){
                        // Save the error message to the session.
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправильный email</p>";
                        //Return the user to the registration page
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/registration.php");
                        //Stop the script
                        exit();
                    }

                    //check if there is already such an address in the database.
                    $result_query = $mysqli->query('SELECT `email` FROM `user` WHERE `email`="'.$email.'"');
                    //If the number of received lines is exactly one, then the user with this mailing address is already registered
                    if($result_query->num_rows == 1){
                        //If the received result is not false
                        if(($row = $result_query->fetch_assoc()) != false){
                                $_SESSION["error_messages"] .= "<p class='mesage_error' >Пользователь с таким почтовым адресом уже зарегистрирован</p>";
                                header("HTTP/1.1 301 Moved Permanently");
                                header("Location: ".$address_site."/registration.php");
                        }else{
                            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка в запросе к БД</p>";
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/registration.php");
                        }
                        /* close selection */
                        $result_query->close();
                        exit();
                    }
                    /* close selection */
                    $result_query->close();
                }else{
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш email</p>";
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/registration.php");
                    exit();
                }
            }else{
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода Email</p>";
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/registration.php");
                exit();
            }            
            if(isset($_POST["password"])){
                $password = trim($_POST["password"]);
                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);
                }else{
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/registration.php");
                    exit();
                }
            }else{
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/registration.php");
                exit();
            }

            // (4) Place for the code for adding a user to the database
            //Request to add a user to the database
            $result_query_insert = $mysqli->query('INSERT INTO user (login, email, password) VALUES ("'.$login.'", "'.$email.'", "'.$password.'")');
            if(!$result_query_insert){
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/registration.php");
                exit();
            }else{
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/registration_next.php");
            }
            /* Completing the request */
            $result_query_insert->close();
            //Closing the DB connection
            $mysqli->close();
        }else{
            //If captcha is not sent or it is empty
            exit("<p><strong>Ошибка!</strong> Отсутствует проверечный код, то есть код капчи. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
        }
    }else{
        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }
?>