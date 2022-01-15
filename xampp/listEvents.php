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
	</head>

	<style>
		table, th, td{
			border: 1px solid black;
		}
	</style>

	<body>
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