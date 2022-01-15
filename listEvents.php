<?php
	include "session.php";

	$query = "SELECT * FROM events";
	if ($stmt = $db->query($query)) {
		$result = $stmt->fetch_all();
	}
?>

<!DOCTYPE html>
<html lang="en">
   
	<head>
		<title>Events</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>

	<style>
		table, th, td{
			border: 1px solid black;
		}
	</style>

	<body>

	<?php include "topButton.php"; ?>
	
		<h1>List Events</h1>
		<table>
			<tr>
				<td style="text-align:center">Event Name</td>
				<td style="text-align:center">Ticket Price</td>
				<td style="text-align:center">Number of Tickets</td>
			</tr>
		<?php
			foreach ($result as $row) {
				echo "<tr><td style='text-align:center'>".$row[0]."</td><td style='text-align:center'>".$row[1]."</td><td style='text-align:center'>".$row[2]."</td><tr>";
			}
		?>
		</table>
	</body>
   
</html>