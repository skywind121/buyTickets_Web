<?php
    include "session.php";
    if (!isset($_SESSION['login_user'])) {
        header("location: login.php");
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM events WHERE eId = '$id'";
    if ($stmt = $db->query($query)) {
        $events = $stmt->fetch_all();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["num"];
        $totalPrice = $num * $events[0][1];
        
        $query = "INSERT INTO records
                    SET userId = (SELECT userId FROM users WHERE username='$user_check'),
                        eId = '$id',
                        totalTickets = '$num',
                        totalPrice = '$totalPrice'";
        
        if ($stmt = $db->query($query)) {
            header("location: listEvents.php");
        }
    }
?>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
    <title>海大資工售票網</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper {
            font: 14px sans-serif;
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <?php include "topButton.php"; ?>

    <div class="wrapper">
        <h1><b>舉辦活動</b></h1>
        <p>請先輸入完整資訊以舉辦新的活動。</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>購買張數</b></span>
                <select id="num" name="num">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div><br>


            <div class="form-group">
                <input type="submit" class="btn btn-outline-warning btn-lg" value="購買">
                <input type="reset" class="btn btn-outline-secondary btn-lg" value="重設">
            </div><br>
        </form>
    </div>

</body>

</html>