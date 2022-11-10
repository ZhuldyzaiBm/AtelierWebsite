<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$categories = getById("categories", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Добавить новую запись</legend>
						<input name="cat" type="hidden" value="categories">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Категория</label>
							<input class="form-control" type="text" name="category" value="<?=$categories['category']?>" /><br>
							<br>
					<input type="submit" value=" Сохранить " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				