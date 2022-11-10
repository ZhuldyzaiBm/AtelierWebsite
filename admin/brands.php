<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-brands.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Добавить новую запись</a>

				<h1>Бренды</h1>
				<p>Эта таблица содержит <?php echo counting("brands", "id");?> записей.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Бренд</th>

				<th class="not">Редактировать</th>
				<th class="not">Удалить</th>
				</tr>
				</thead>

				<?php
				$brands = getAll("brands");
				if($brands) foreach ($brands as $brandss):
					?>
					<tr>
		<td><?php echo $brandss['id']?></td>
		<td><?php echo $brandss['brand']?></td>


						<td><a href="edit-brands.php?act=edit&id=<?php echo $brandss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $brandss['id']?>&cat=brands" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				