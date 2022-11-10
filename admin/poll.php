<?php
				include "includes/header.php";
				?>



				<h1>Отзывы</h1>
				<p>Эта таблица содержит <?php echo counting("poll", "id");?> записей.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Имя</th>
			<th>Email</th>
			<th>Отзыв</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$poll = getAll("poll");
				if($poll) foreach ($poll as $polls):
					?>
					<tr>
		<td><?php echo $polls['id']?></td>
		<td><?php echo $polls['name']?></td>
		<td><?php echo $polls['email']?></td>
		<td><?php echo $polls['feedback']?></td>


						<td><a href="edit-poll.php?act=edit&id=<?php echo $polls['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $polls['id']?>&cat=poll" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				