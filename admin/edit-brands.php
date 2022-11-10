<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$brands = getById("brands", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Добавить новую запись</legend>
						<input name="cat" type="hidden" value="brands">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Бренд</label>
							<input class="form-control" type="text" name="brand" value="<?=$brands['brand']?>" /><br>
							<br>
					<input type="submit" value=" Сохранить " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				