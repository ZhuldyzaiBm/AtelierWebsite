<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$users = getById("users", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Users</legend>
						<input name="cat" type="hidden" value="users">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="Name" value="<?=$users['Name']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="Email" value="<?=$users['Email']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="Password" value="<?=$users['Password']?>" /><br>
							
							<label>Role</label>
							<input class="form-control" type="text" name="Role" value="<?=$users['Role']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				