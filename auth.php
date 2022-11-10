<?php
    //Starting the session
    session_start();
    //adding the connection file to the database
    require_once("dbconnect.php");
    //declaring a cell to add errors that may occur while processing the form
    $_SESSION["error_messages"] = '';
    //declaring a cell for adding successful messages
    $_SESSION["success_messages"] = '';
    //creating a two-dimensional array for authorization into adminpage
    $adminpanel = array( array("admin@mail.ru", "admin123", "admin"),
                  array("bisenay@mail.ru", "bisenay123", "seamstress"),
                  array("anarprm_khl@mail.ru", "anara123", "seamstress"),
                  array("zhanar92@yandex.kz", "zhanar92", "seamstress"),
                  array("Kuralai_78@mail.ru", "no2phs", "seamstress"),
                  array("laylim_kanl@mail.ru", "laika23", "seamstress") 
                ); 
    /*
    We check if the form was submitted, that is, if the Log in button was clicked. If yes, then go ahead, if not, then display an error message to the user stating that he went to this page directly.
    */
    if(isset($_POST["btn_submit_auth"]) && !empty($_POST["btn_submit_auth"])){
        //Checking the received captcha
        if(isset($_POST["captcha"])){
            //Triming spaces from the beginning and end of the line
            $captcha = trim($_POST["captcha"]);
            if(!empty($captcha)){
                //comparing the received value with the value from the session. 
                if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                    // If the captcha is not correct, then we return the user to the authorization page, and there we will display an error message that he entered the wrong captcha.
                    $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Вы ввели неправильную капчу </p>";
                    // Save the error message to the session.
                    $_SESSION["error_messages"] = $error_message;
                    //Returning the user to the login page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
                    //Stopping the script
                    exit();
                }
            }else{                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Поле для ввода капчи не должна быть пустой. </p>";
                // Save the error message to the session.
                $_SESSION["error_messages"] = $error_message;
                //Returning the user to the login page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
                //Stopping the script
                exit();
            }
            // Place for processing mailing address
            //Triming spaces from the beginning and end of the line
            $email = trim($_POST["email"]);
            if(isset($_POST["email"])){
                if(!empty($email)){
                    $email = htmlspecialchars($email, ENT_QUOTES);
                    //Checking the format of the received mailing address using a regular expression
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";
                    //If the format of the received email address does not match the regular expression
                    if( !preg_match($reg_email, $email)){
                        // If the format of the received email address does not match the regular expression
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправильный email</p>";
                        //Returning the user to the log in page
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/form_auth.php");
                        //Stopping the script
                        exit();
                    }
                }else{
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Поле для ввода почтового адреса(email) не должна быть пустой.</p>";
                    //Returning the user to the login page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/registration.php");
                    //Stopping the script
                    exit();
                }
            }else{
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода Email</p>";
                //Returning the user to the login page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
                //Stopping the script
                exit();
            }
            // A place to process the password
            if(isset($_POST["password"])){
                //Trim spaces from the beginning and end of the line
                $password = trim($_POST["password"]);
                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);
                }else{
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш пароль</p>";
                    //Returning the user to the authorization page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
                    //Stopping the script
                    exit();
                }
            }else{
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода пароля</p>";
                //Returning the user to the authorization page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
                //Stopping the script
                exit();
            }
            //Place to compose a query to the database
            //checking matching of email and password for adminpage
 for ($row=0; $row<4; $row++)
{
    // If match
        if ($email==$adminpanel[$row][0] & $password==$adminpanel[$row][1])
        {
            //Opening the admin panel homepage
            header("HTTP/1.1 301 Moved Permanently");
            header("location:".$adminpanel[$row][2]."/home.php");
            exit();
        }
    } 
            $result_query_select = $mysqli->query("SELECT * FROM `user` WHERE email = '".$email."' AND password = '".$password."'");
            if(!$result_query_select){
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
                //Returning the user to the authorization page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
                //Stopping the script
                exit();
            }else{
                //Check if there is no user with such data in the database, then we display an error message
                if($result_query_select->num_rows == 1){
                    // If the entered data match the data from the database, then we save the login and password to the session array.
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    //Returning the user to the main page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");
                }else{
                    // Save the error message to the session. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный email и/или пароль</p>";
                    //Returning the user to the authorization page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
                    //Stopping the script
                    exit();
                }
            }
    } else{
            //if captcha isn't transferred
            exit("<p><strong>Ошибка!</strong> Отсутствует проверочный код, то есть код капчи. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
        }
    }else{
        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }