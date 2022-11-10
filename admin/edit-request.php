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
						<legend class="hidden-first">Редактирование</legend>
						<input name="cat" type="hidden" value="request">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
												
							<label>Портниха</label>
							<input class="form-control" type="text" name="seamstress" value="<?=$request['seamstress']?>" /><br>
							
							<label>Параметры</label>
							<input class="form-control" type="text" name="Parameters" value="<?=$request['seamstress']?>" /><br>
							
							
							<label>Стоимость работы</label>
							<input class="form-control" type="text" name="Cost" value="<?=$request['Cost']?>" /><br>
							
							<label>Заметки</label>
							<input class="form-control" type="text" name="Notes" value="<?=$request['seamstress']?>" /><br>
							<br>
					<input type="submit" value=" Сохранить " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				