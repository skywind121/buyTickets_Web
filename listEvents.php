<!DOCTYPE html>
<html lang="en">
   
	<head>
		<title>Events</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>

	<style>
		.table{
			width: 500px;
		}
	</style>

	<body>

	<?php 
		include "topButton.php"; 
		$query = "SELECT * FROM events";
		if ($stmt = $db->query($query)) {
			$result = $stmt->fetch_all();
		}
	?>
		
		<br><br>
		<h1>活動列表</h1>
		<table class="table table-striped">
			<tr>
				<td style="text-align:center" >活動名稱</td>
				<td style="text-align:center">門票價錢</td>
				<td style="text-align:center">門票數量</td>
				<td style="text-align:center">活動編號</td>
			</tr>
		<?php
			foreach ($result as $row) {
				echo "<tr>
				<td style='text-align:center'>".$row[0]."</td>
				<td style='text-align:center'>".$row[1]."</td>
				<td style='text-align:center'>".$row[2]."</td>
				<td style='text-align:center'>".$row[3]."</td>
				<td style='text-align:center'>"."修改"."</td>
				<td><a href=delEvent.php?id=".$row[3].">刪除</a></td>
				<tr>";
			}
		?>
		</table>
	</body>
   
</html>