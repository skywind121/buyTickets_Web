<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>公告</title>
    </head>

 
    <body>

        <a href="http://localhost/main.php" style="text-decoration:none;">
            <img src="/img/ticket.png" width="5%" height="10%" >
            <font color="black" size="6" >海大資工購票網</font>
        </a>
        |
        <a href="http://localhost/news.php" style="text-decoration:none;">
            <font color="blue" size="6" ><b>公告</b></font>
        </a>
        <br><br>

        <?php
        include "db_conn.php";

        echo "
        <table border = '1'>
        <tr>
        <th>姓名</th>
        <th>年齡</th>
        <th>性別</th>
        <th>號碼</th>
        </tr>";
        $query2 = "SELECT * FROM student";
        if($stmt = $db -> query($query2)){
            while($result = mysqli_fetch_object($stmt)){
                echo "<tr>";
                echo "<td>".$result->name."</td>";
                echo "<td>".$result->age."</td>";
                echo "<td>".$result->gender."</td>";
                echo "<td>".$result->no."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        ?>

    </body>
  
</html>