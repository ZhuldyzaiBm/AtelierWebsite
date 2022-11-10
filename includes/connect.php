<?php
		$link = mysqli_connect("localhost", "mysql", "mysql");
		mysqli_select_db($link, "atelier");  
		mysqli_query($link, "SET CHARACTER SET utf8");
		?>