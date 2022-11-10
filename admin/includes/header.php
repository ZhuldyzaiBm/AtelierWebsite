<?php
		error_reporting(0);
		session_start();
		//starting authorization session
		if ($_COOKIE["auth"] != "admin_in"){header("location:"."./");}
		// connecting database and functions
			include("includes/connect.php");
			include("includes/data.php");
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="author" content="@housamz">
				<meta name="description" content="Mass Admin Panel">
				<title>Ателье: панель админа</title>
				<!--connecting css styles-->
				<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">
				<link rel="stylesheet" href="includes/style.css">
				<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
			</head>
			<body>
			<div class="wrapper">
				<!-- Sidebar Holder -->
				<nav id="sidebar" class="bg-primary">
					<div class="sidebar-header">
						<h3>
							Ателье: панель админа<br>
							<i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i>
						</h3>
						<strong>
							Aтелье<br>
							<i id="sidebarExtend" class="glyphicon glyphicon-circle-arrow-right"></i>
						</strong>
					</div>
					<!-- navigation bar -->
					<ul class="list-unstyled components">
						<li>
							<a href="home.php" aria-expanded="false">
								<i class="glyphicon glyphicon-home"></i>
								Главная
							</a>
						</li>
			<li><a href="brands.php"> <i class="glyphicon glyphicon-zoom-out"></i>Бренды <span class="pull-right"><?=counting("brands", "id")?></span></a></li>
<li><a href="categories.php"> <i class="glyphicon glyphicon-xbt"></i>Категории <span class="pull-right"><?=counting("categories", "id")?></span></a></li>
<li><a href="details.php"> <i class="glyphicon glyphicon-link"></i>Детали <span class="pull-right"><?=counting("details", "id")?></span></a></li>
<li><a href="goods.php"> <i class="glyphicon glyphicon-off"></i>Товары <span class="pull-right"><?=counting("goods", "id")?></span></a></li>
<li><a href="orders.php"> <i class="glyphicon glyphicon-lamp"></i>Заказы <span class="pull-right"><?=counting("orders", "id")?></span></a></li>
<li><a href="poll.php"> <i class="glyphicon glyphicon-text-background"></i>Отзывы <span class="pull-right"><?=counting("poll", "id")?></span></a></li>
<li><a href="request.php"> <i class="glyphicon glyphicon-warning-sign"></i>Заявки <span class="pull-right"><?=counting("request", "id")?></span></a></li>
<li><a href="user.php"> <i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>Пользователи <span class="pull-right"><?=counting("user", "id")?></span></a></li>
<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Выйти</a></li>
				</ul>
			</nav>
			<!-- Page Content Holder -->
			<div id="content">