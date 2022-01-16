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
		// $query = "SELECT * FROM ((records INNER JOIN events) INNER JOIN users) WHERE username = $user_check";
        $query = "SELECT * FROM ((records NATURAL JOIN events) NATURAL JOIN users) WHERE username = '$user_check'";
		if ($stmt = $db->query($query)) {
			$result = $stmt->fetch_all();
		}
	?>
		
		<br><br>
		<h1>活動列表</h1>
		<table class="table table-striped">
			<tr>
				<td style="text-align:center" >活動名稱</td>
				<td style="text-align:center">金額</td>
			</tr>
		<?php
			foreach ($result as $row) {
				echo "<tr>
				<td style='text-align:center'>".$row[3]."</td>
				<td style='text-align:center'>".$row[2]."</td>
				<tr>";
			}
		?>
		</table>
	</body>
   
</html>