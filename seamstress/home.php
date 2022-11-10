<?php
		//connecting header
		include "includes/header.php";
		?>
		<table class="table table-striped">
		<tr>
		<!--displaying tables and number of rows accessed-->
		<th class="not">Таблицы</th>
		<th class="not">Записи</th>
		</tr>
				<tr>
					<!--table that can be accessed-->
					<td><a href="request.php">Request</a></td>
					<td><?=counting("request", "id")?></td>
				</tr>
				</table>
				<!--connecting footer-->
			<?php include "includes/footer.php";?>