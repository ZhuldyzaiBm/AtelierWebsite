<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$request = getById("request", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Добавить новую запись</legend>
						<input name="cat" type="hidden" value="request">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$request['email']?>" /><br>
							
							<label>Name</label>
							<input class="form-control" type="text" name="name" value="<?=$request['name']?>" /><br>
							
							<label>Work</label>
							<input class="form-control" type="text" name="work" value="<?=$request['work']?>" /><br>
							
							<label>Phone</label>
							<input class="form-control" type="text" name="phone" value="<?=$request['phone']?>" /><br>
							
							<label>Dt added</label>
							<input class="form-control" type="text" name="dt_added" value="<?=$request['dt_added']?>" /><br>
							
							<label>Seamstress</label>
							<input class="form-control" type="text" name="seamstress" value="<?=$request['seamstress']?>" /><br>
							
							<label>Parameters</label>
							<textarea class="ckeditor form-control" name="Parameters"><?=$request['Parameters']?></textarea><br>
							
							<label>Cost</label>
							<input class="form-control" type="text" name="Cost" value="<?=$request['Cost']?>" /><br>
							
							<label>Notes</label>
							<textarea class="ckeditor form-control" name="Notes"><?=$request['Notes']?></textarea><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				