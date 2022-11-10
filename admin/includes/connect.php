<?php
//server database credentials
		$link = mysqli_connect("localhost", "mysql", "mysql");
		mysqli_select_db($link, "atelier");  
//setting character set
		mysqli_query($link, "SET CHARACTER SET utf8");
		?>