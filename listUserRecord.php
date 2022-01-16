<!DOCTYPE html>
<html lang="en">

<head>
	<title>查看已購票的活動</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Option 1: Include in HTML -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


</head>

<style>
	.table {
		width: 500px;
	}
</style>

<body>

	<?php
	include "topButton.php";
	$query = "SELECT * FROM ((records NATURAL JOIN events) NATURAL JOIN users) WHERE username = '$user_check'";
	if ($stmt = $db->query($query)) {
		$result = $stmt->fetch_all();
	}
	?>
		
		<br><br>
		<h1>購票紀錄</h1>
		<table class="table table-striped">
			<tr>
				<td style="text-align:center" >活動名稱</td>
				<td style="text-align:center">金額</td>
			</tr>
		<?php
			foreach ($result as $row) {
				echo "<tr>
				<td style='text-align:center'>".$row[5]."</td>
				<td style='text-align:center'>".$row[3]."</td>
				<tr>";
		}
		?>
	</table>
    <h3>Total: $<?php 
    $query = "SELECT SUM(totalPrice) FROM ((records NATURAL JOIN events) NATURAL JOIN users) WHERE username = '$user_check'";
	if ($stmt = $db->query($query)) {
		$result = $stmt->fetch_all();
        echo $result[0][0];
	}
    ?></h3>
</body>

</html>