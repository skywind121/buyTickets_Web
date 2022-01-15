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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a href="http://localhost/main.php" style="text-decoration:none;">
        <img src="/img/ticket.png" width="20%" height="20%">
        <font color="white" size="6"><b>海大資工購票網</b></font>
    </a>

    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/main.php"><b>首頁</b></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="http://localhost/News.php"><b>公告</b></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navbar-brand" aria-current="page" href="http://localhost/news.php">
                        公告
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">登入</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        節目資訊
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    </nav>
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
