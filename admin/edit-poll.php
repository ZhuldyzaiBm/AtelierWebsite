<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$poll = getById("poll", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Poll</legend>
						<input name="cat" type="hidden" value="poll">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="name" value="<?=$poll['name']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$poll['email']?>" /><br>
							
							<label>Feedback</label>
							<textarea class="ckeditor form-control" name="feedback"><?=$poll['feedback']?></textarea><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				