<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-categories.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Добавить новую запись</a>

				<h1>Категории</h1>
				<p>Эта таблица содержит <?php echo counting("categories", "id");?> записей.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Категория</th>

				<th class="not">Редактировать</th>
				<th class="not">Удалить</th>
				</tr>
				</thead>

				<?php
				$categories = getAll("categories");
				if($categories) foreach ($categories as $categoriess):
					?>
					<tr>
		<td><?php echo $categoriess['id']?></td>
		<td><?php echo $categoriess['category']?></td>


						<td><a href="edit-categories.php?act=edit&id=<?php echo $categoriess['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $categoriess['id']?>&cat=categories" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				