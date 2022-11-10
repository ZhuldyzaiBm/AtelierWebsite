<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$orders = getById("orders", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Orders</legend>
						<input name="cat" type="hidden" value="orders">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="Name" value="<?=$orders['Name']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="Email" value="<?=$orders['Email']?>" /><br>
							
							<label>Phone</label>
							<input class="form-control" type="text" name="Phone" value="<?=$orders['Phone']?>" /><br>
							
							<label>Address</label>
							<input class="form-control" type="text" name="address" value="<?=$orders['address']?>" /><br>
							
							<label>Message</label>
							<input class="form-control" type="text" name="message" value="<?=$orders['message']?>" /><br>
							
							<label>Dt added</label>
							<input class="form-control" type="text" name="dt_added" value="<?=$orders['dt_added']?>" /><br>
							
							<label>Delivery type</label>
							<input class="form-control" type="text" name="delivery_type" value="<?=$orders['delivery_type']?>" /><br>
							
							<label>Cost</label>
							<input class="form-control" type="text" name="cost" value="<?=$orders['cost']?>" /><br>
							
							<label>Status</label>
							<input class="form-control" type="text" name="Status" value="<?=$orders['Status']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				