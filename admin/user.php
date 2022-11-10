<?php
				include "includes/header.php";
				?>

				<h1>Пользователи</h1>
				<p>Эта таблица содержит <?php echo counting("user", "id");?> записей.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Email</th>
			<th>Логин</th>
			<th>Пароль</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$user = getAll("user");
				if($user) foreach ($user as $users):
					?>
					<tr>
		<td><?php echo $users['email']?></td>
		<td><?php echo $users['login']?></td>
		<td><?php echo $users['password']?></td>


						<td><a href="edit-user.php?act=edit&id=<?php echo $users['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $users['id']?>&cat=user" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				