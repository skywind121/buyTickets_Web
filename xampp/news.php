<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>公告</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

        <table class="table table-hover">

        </table>

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

        <!-- Bootstrap JavaScript -->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
  
</html>