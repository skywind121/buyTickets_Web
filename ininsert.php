<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>HelloWorld</title>
        <style type = "text/CSS">
            body{
                text-align: center;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

        <?php include "topButton.php"; ?>
        <br><br>
        <?php
        include "db_conn.php";

        $name   = $_POST["name"];
        $ticketPrice    = $_POST["ticketPrice"];
        $numTickets = $_POST["numTickets"];
        $eId     = $_POST["eId"];

        $query = ("insert into events values(?,?,?,?)");
        $stmt = $db -> prepare($query);
        $stmt -> bind_param("siii", $name,$ticketPrice,$numTickets,$eId);
        $stmt -> execute();

        echo "
        <table border = '1'>
        <tr>
        <th>活動名稱</th>
        <th>門票價錢</th>
        <th>門票數量</th>
        <th>活動編號</th>
        </tr>";
        $query2 = "SELECT * FROM events";
        if($stmt = $db -> query($query2)){
            while($result = mysqli_fetch_object($stmt)){
                echo "<tr>";
                echo "<td>".$result->name."</td>";
                echo "<td>".$result->ticketPrice."</td>";
                echo "<td>".$result->numTickets."</td>";
                echo "<td>".$result->eId."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        ?>

        <a href="http://localhost/main.php">返回</a>
    </body>
</html>
