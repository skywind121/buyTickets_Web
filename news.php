<html>

<head>

    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
    <title>公告</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style type = "text/CSS">
		p{
            font-size: 100px;
        }
		
	</style>
</head>

<body>
    <?php include "topButton.php"; ?>

    <a class="navbar-brand" aria-current="page" href="http://localhost/addNews.php"><span class="h3 mx-1"><b>
                                <i class="bi bi-person-plus-fill"></i> 新增公告
                            </b></span></a>


    <?php
	$query = "SELECT * FROM news";
	if ($stmt = $db->query($query)) {
		$result = $stmt->fetch_all();
	}
	?>

	<br><br>
	<h1>公告</h1>
	<table class="table table-striped">
		<tr>
			<td style="text-align:center">標題</td>
			<td style="text-align:center">内容</td>
		</tr>
		<?php
		foreach ($result as $row) {
			echo "<tr>
				<td style='text-align:center'>" . $row[1] . "</td>
				<td style='text-align:center'>" . $row[2] . "</td>
				<tr>";
		}
		?>
	</table>
</body>

</html>