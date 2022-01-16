<?php
include "db_conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newsId = mysqli_real_escape_string($db, $_POST['newsId']);
        $newsTitle = mysqli_real_escape_string($db, $_POST['newsTitle']);
        $newsContent = mysqli_real_escape_string($db, $_POST['newsContent']);

        $query = "INSERT INTO news (newsTitle, newsContent) VALUES ('$newsTitle', '$newsContent')";
                if ($stmt = $db->query($query)) {
                    header("location: news.php");
                }

        /*$query = "SELECT * FROM news WHERE username='$username'";
        if ($stmt = $db->query($query)) {
            if (mysqli_num_rows($stmt) == 1) {
                echo "Username taken. Please choose another username.";
            } else if ($passcode != $passcode_confirm) {
                echo "The password and confirmation password do not match.";
            } else {
                $query = "INSERT INTO users (username, passcode) VALUES ('$username', '$passcode')";
                if ($stmt = $db->query($query)) {
                    header("location: login.php");
                }
            }
        }*/
    }
?>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
    <title>新增公告</title>

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

    <div class="wrapper">
        <h1><b>新增公告</b></h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>標題</b></span>
                <input type="text" name="newsTitle"  class="form-control ">
                <span class="invalid-feedback"></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>内容</b></span>
                <input type="text" name="newsContent"  class="form-control  ">
                <span class="invalid-feedback"></span>
            </div><br>

            <div class="form-group">
                <input type="submit" class="btn btn-outline-success btn-lg" value="上傳">
                <input type="reset" class="btn btn-outline-secondary btn-lg" value="重設">
            </div><br>

        </form>
    </div>

</body>

</html>