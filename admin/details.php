<?php
				include "includes/header.php";
				?>


				<h1>Детали</h1>
				<p>Эта таблица содержит <?php echo counting("details", "id");?> записей.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>id заказа</th>
			<th>id товара</th>
			<th>Название товара</th>
			<th>Цена</th>
			<th>Количество</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$details = getAll("details");
				if($details) foreach ($details as $detailss):
					?>
					<tr>
		<td><?php echo $detailss['order_id']?></td>
		<td><?php echo $detailss['good_id']?></td>
		<td><?php echo $detailss['good']?></td>
		<td><?php echo $detailss['price']?></td>
		<td><?php echo $detailss['count']?></td>


						<td><a href="edit-details.php?act=edit&id=<?php echo $detailss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $detailss['id']?>&cat=details" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				