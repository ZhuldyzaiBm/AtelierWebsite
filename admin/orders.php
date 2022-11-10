<?php
				include "includes/header.php";
				?>



				<h1>Заказы</h1>
				<p>Эта таблица содержит <?php echo counting("orders", "id");?> записей.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Имя</th>
			<th>Email</th>
			<th>Номер телефона</th>
			<th>Aдрес</th>
			<th>Сообщение</th>
			<th>Дата заказа</th>
			<th>Метод доставки</th>
			<th>Сумма заказа</th>
			<th>Статус</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$orders = getAll("orders");
				if($orders) foreach ($orders as $orderss):
					?>
					<tr>
		<td><?php echo $orderss['id']?></td>
		<td><?php echo $orderss['Name']?></td>
		<td><?php echo $orderss['Email']?></td>
		<td><?php echo $orderss['Phone']?></td>
		<td><?php echo $orderss['address']?></td>
		<td><?php echo $orderss['message']?></td>
		<td><?php echo $orderss['dt_added']?></td>
		<td><?php echo $orderss['delivery_type']?></td>
		<td><?php echo $orderss['cost']?></td>
		<td><?php echo $orderss['Status']?></td>


						<td><a href="edit-orders.php?act=edit&id=<?php echo $orderss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $orderss['id']?>&cat=orders" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				