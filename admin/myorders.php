<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-myorders.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Myorders</a>

				<h1>Myorders</h1>
				<p>This table includes <?php echo counting("myorders", "id");?> myorders.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Message</th>
			<th>Dt added</th>
			<th>Delivery type</th>
			<th>Cost</th>
			<th>Order status</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$myorders = getAll("myorders");
				if($myorders) foreach ($myorders as $myorderss):
					?>
					<tr>
		<td><?php echo $myorderss['id']?></td>
		<td><?php echo $myorderss['name']?></td>
		<td><?php echo $myorderss['email']?></td>
		<td><?php echo $myorderss['phone']?></td>
		<td><?php echo $myorderss['address']?></td>
		<td><?php echo $myorderss['message']?></td>
		<td><?php echo $myorderss['dt_added']?></td>
		<td><?php echo $myorderss['delivery_type']?></td>
		<td><?php echo $myorderss['cost']?></td>
		<td><?php echo $myorderss['order_status']?></td>


						<td><a href="edit-myorders.php?act=edit&id=<?php echo $myorderss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $myorderss['id']?>&cat=myorders" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				