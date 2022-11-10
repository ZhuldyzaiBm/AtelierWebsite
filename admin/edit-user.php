<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$user = getById("user", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New User</legend>
						<input name="cat" type="hidden" value="user">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Login</label>
							<input class="form-control" type="text" name="login" value="<?=$user['login']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="password" value="<?=$user['password']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				