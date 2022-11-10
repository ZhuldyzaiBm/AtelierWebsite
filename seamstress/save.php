<?php
		include("includes/connect.php");

		$cat = $_POST['cat'];
		$cat_get = $_GET['cat'];
		$act = $_POST['act'];
		$act_get = $_GET['act'];
		$id = $_POST['id'];
		$id_get = $_GET['id'];

		
				if($cat == "brands" || $cat_get == "brands"){
					$brand = mysqli_real_escape_string($link,$_POST["brand"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `brands` (  `brand` ) VALUES ( '".$brand."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `brands` SET  `brand` =  '".$brand."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `brands` WHERE id = '".$id_get."' ");
					}
					header("location:"."brands.php");
				}
				
				if($cat == "categories" || $cat_get == "categories"){
					$category = mysqli_real_escape_string($link,$_POST["category"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `categories` (  `category` ) VALUES ( '".$category."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `categories` SET  `category` =  '".$category."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `categories` WHERE id = '".$id_get."' ");
					}
					header("location:"."categories.php");
				}
				
				if($cat == "goods" || $cat_get == "goods"){
					$good = mysqli_real_escape_string($link,$_POST["good"]);
$category_id = mysqli_real_escape_string($link,$_POST["category_id"]);
$brand_id = mysqli_real_escape_string($link,$_POST["brand_id"]);
$price = mysqli_real_escape_string($link,$_POST["price"]);
$rating = mysqli_real_escape_string($link,$_POST["rating"]);
$photo = mysqli_real_escape_string($link,$_POST["photo"]);
$Description = mysqli_real_escape_string($link,$_POST["Description"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `goods` (  `good` , `category_id` , `brand_id` , `price` , `rating` , `photo` , `Description` ) VALUES ( '".$good."' , '".$category_id."' , '".$brand_id."' , '".$price."' , '".$rating."' , '".$photo."' , '".$Description."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `goods` SET  `good` =  '".$good."' , `category_id` =  '".$category_id."' , `brand_id` =  '".$brand_id."' , `price` =  '".$price."' , `rating` =  '".$rating."' , `photo` =  '".$photo."' , `Description` =  '".$Description."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `goods` WHERE id = '".$id_get."' ");
					}
					header("location:"."goods.php");
				}
				
				if($cat == "myorders" || $cat_get == "myorders"){
					$name = mysqli_real_escape_string($link,$_POST["name"]);
$email = mysqli_real_escape_string($link,$_POST["email"]);
$phone = mysqli_real_escape_string($link,$_POST["phone"]);
$address = mysqli_real_escape_string($link,$_POST["address"]);
$dt_added = mysqli_real_escape_string($link,$_POST["dt_added"]);
$order_status = mysqli_real_escape_string($link,$_POST["order_status"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `myorders` (  `name` , `email` , `phone` , `address` , `dt_added` , `order_status` ) VALUES ( '".$name."' , '".$email."' , '".$phone."' , '".$address."' , '".$dt_added."' , '".$order_status."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `myorders` SET  `name` =  '".$name."' , `email` =  '".$email."' , `phone` =  '".$phone."' , `address` =  '".$address."' , `dt_added` =  '".$dt_added."' , `order_status` =  '".$order_status."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `myorders` WHERE id = '".$id_get."' ");
					}
					header("location:"."myorders.php");
				}
				
				if($cat == "orders" || $cat_get == "orders"){
					$client_id = mysqli_real_escape_string($link,$_POST["client_id"]);
$Email = mysqli_real_escape_string($link,$_POST["Email"]);
$address = mysqli_real_escape_string($link,$_POST["address"]);
$message = mysqli_real_escape_string($link,$_POST["message"]);
$dt_added = mysqli_real_escape_string($link,$_POST["dt_added"]);
$Status = mysqli_real_escape_string($link,$_POST["Status"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `orders` (  `client_id` , `Email` , `address` , `message` , `dt_added` , `Status` ) VALUES ( '".$client_id."' , '".$Email."' , '".$address."' , '".$message."' , '".$dt_added."' , '".$Status."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `orders` SET  `client_id` =  '".$client_id."' , `Email` =  '".$Email."' , `address` =  '".$address."' , `message` =  '".$message."' , `dt_added` =  '".$dt_added."' , `Status` =  '".$Status."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `orders` WHERE id = '".$id_get."' ");
					}
					header("location:"."orders.php");
				}
				
				if($cat == "poll" || $cat_get == "poll"){
					$name = mysqli_real_escape_string($link,$_POST["name"]);
$email = mysqli_real_escape_string($link,$_POST["email"]);
$phone = mysqli_real_escape_string($link,$_POST["phone"]);
$feedback = mysqli_real_escape_string($link,$_POST["feedback"]);
$suggestions = mysqli_real_escape_string($link,$_POST["suggestions"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `poll` (  `name` , `email` , `phone` , `feedback` , `suggestions` ) VALUES ( '".$name."' , '".$email."' , '".$phone."' , '".$feedback."' , '".$suggestions."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `poll` SET  `name` =  '".$name."' , `email` =  '".$email."' , `phone` =  '".$phone."' , `feedback` =  '".$feedback."' , `suggestions` =  '".$suggestions."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `poll` WHERE id = '".$id_get."' ");
					}
					header("location:"."poll.php");
				}
				
				if($cat == "request" || $cat_get == "request"){
					$email = mysqli_real_escape_string($link,$_POST["email"]);
$name = mysqli_real_escape_string($link,$_POST["name"]);
$work = mysqli_real_escape_string($link,$_POST["work"]);
$phone = mysqli_real_escape_string($link,$_POST["phone"]);
$dt_added = mysqli_real_escape_string($link,$_POST["dt_added"]);
$seamstress = mysqli_real_escape_string($link,$_POST["seamstress"]);
$Parameters = mysqli_real_escape_string($link,$_POST["Parameters"]);
$Cost = mysqli_real_escape_string($link,$_POST["Cost"]);
$Notes = mysqli_real_escape_string($link,$_POST["Notes"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `request` (  `email` , `name` , `work` , `phone` , `dt_added` , `seamstress` , `Parameters` , `Cost` , `Notes` ) VALUES ( '".$email."' , '".$name."' , '".$work."' , '".$phone."' , '".$dt_added."' , '".$seamstress."' , '".$Parameters."' , '".$Cost."' , '".$Notes."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `request` SET  `email` =  '".$email."' , `name` =  '".$name."' , `work` =  '".$work."' , `phone` =  '".$phone."' , `dt_added` =  '".$dt_added."' , `seamstress` =  '".$seamstress."' , `Parameters` =  '".$Parameters."' , `Cost` =  '".$Cost."' , `Notes` =  '".$Notes."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `request` WHERE id = '".$id_get."' ");
					}
					header("location:"."request.php");
				}
				
				if($cat == "user" || $cat_get == "user"){
					$login = mysqli_real_escape_string($link,$_POST["login"]);
$email = mysqli_real_escape_string($link,$_POST["email"]);
$password = mysqli_real_escape_string($link,$_POST["password"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `user` (  `login` , `email` , `password` ) VALUES ( '".$login."' , '".$email."' , '".md5($password)."') ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `user` SET  `login` =  '".$login."' , `email` =  '".$email."'  WHERE `id` = '".$id."' "); 
					if($_POST["password"] && $_POST["password"] != ""){
						mysqli_query($link, "UPDATE `user` SET  `password` =  '".md5($password)."' WHERE `id` = '".$id."' ");
					}
						
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `user` WHERE id = '".$id_get."' ");
					}
					header("location:"."user.php");
				}
				
				if($cat == "users" || $cat_get == "users"){
					$Id = mysqli_real_escape_string($link,$_POST["Id"]);
$Name = mysqli_real_escape_string($link,$_POST["Name"]);
$Email = mysqli_real_escape_string($link,$_POST["Email"]);
$Password = mysqli_real_escape_string($link,$_POST["Password"]);
$Role = mysqli_real_escape_string($link,$_POST["Role"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `users` (  `Id` , `Name` , `Email` , `Password` , `Role` ) VALUES ( '".$Id."' , '".$Name."' , '".$Email."' , '".$Password."' , '".$Role."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `users` SET  `Id` =  '".$Id."' , `Name` =  '".$Name."' , `Email` =  '".$Email."' , `Password` =  '".$Password."' , `Role` =  '".$Role."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `users` WHERE id = '".$id_get."' ");
					}
					header("location:"."users.php");
				}
				?>