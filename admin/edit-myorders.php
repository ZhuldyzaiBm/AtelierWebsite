<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$myorders = getById("myorders", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Myorders</legend>
						<input name="cat" type="hidden" value="myorders">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="name" value="<?=$myorders['name']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$myorders['email']?>" /><br>
							
							<label>Phone</label>
							<input class="form-control" type="text" name="phone" value="<?=$myorders['phone']?>" /><br>
							
							<label>Address</label>
							<input class="form-control" type="text" name="address" value="<?=$myorders['address']?>" /><br>
							
							<label>Message</label>
							<input class="form-control" type="text" name="message" value="<?=$myorders['message']?>" /><br>
							
							<label>Dt added</label>
							<input class="form-control" type="text" name="dt_added" value="<?=$myorders['dt_added']?>" /><br>
							
							<label>Delivery type</label>
							<input class="form-control" type="text" name="delivery_type" value="<?=$myorders['delivery_type']?>" /><br>
							
							<label>Cost</label>
							<input class="form-control" type="text" name="cost" value="<?=$myorders['cost']?>" /><br>
							
							<label>Order status</label>
							<input class="form-control" type="text" name="order_status" value="<?=$myorders['order_status']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				