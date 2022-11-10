<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$details = getById("details", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Details</legend>
						<input name="cat" type="hidden" value="details">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Good</label>
							<input class="form-control" type="text" name="good" value="<?=$details['good']?>" /><br>
							
							<label>Price</label>
							<input class="form-control" type="text" name="price" value="<?=$details['price']?>" /><br>
							
							<label>Count</label>
							<input class="form-control" type="text" name="count" value="<?=$details['count']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				