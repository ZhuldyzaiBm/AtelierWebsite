<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-request.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Добавить новую запись</a>

				<h1>Request</h1>
				<p>Данная таблица отображает <?php echo counting("request", "id");?> request.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Email</th>
			<th>Name</th>
			<th>Work</th>
			<th>Phone</th>
			<th>Dt added</th>
			<th>Seamstress</th>
			<th>Parameters</th>
			<th>Cost</th>
			<th>Notes</th>

				<th class="not">Редактировать</th>
				<th class="not">Удалить</th>
				</tr>
				</thead>

				<?php
				$request = getAll("request");
				if($request) foreach ($request as $requests):
					?>
					<tr>
		<td><?php echo $requests['id']?></td>
		<td><?php echo $requests['email']?></td>
		<td><?php echo $requests['name']?></td>
		<td><?php echo $requests['work']?></td>
		<td><?php echo $requests['phone']?></td>
		<td><?php echo $requests['dt_added']?></td>
		<td><?php echo $requests['seamstress']?></td>
		<td><?php echo $requests['Parameters']?></td>
		<td><?php echo $requests['Cost']?></td>
		<td><?php echo $requests['Notes']?></td>


						<td><a href="edit-request.php?act=edit&id=<?php echo $requests['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $requests['id']?>&cat=request" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				