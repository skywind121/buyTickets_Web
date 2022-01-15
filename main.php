<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>海大資工售票網</title>
    </head>

 
    <body>

        <a href="http://localhost/main.php" style="text-decoration:none;"> 
            <img src="/img/ticket.png" width="5%" height="10%" >
            <font color="blue" size="6" ><b>海大資工購票網</b></font>
        </a>
        |
        <a href="http://localhost/news.php" style="text-decoration:none;">
            <font color="black" size="6" >公告</font>
        </a>

        <form action="ininsert.php" method="post">
            <br><br>
            姓名:<input type="varchar" name="name">
            <br><br>
            年齡:<input type="int" name="age">
            <br><br>
            性別:<input type="varchar" name="gender">
            <br><br>
            編號:<input type="int" name="no">
            <br><br>
            <input type="submit" name="up" style="background-color#5393e8" value="送出">
        </form>

    </body>
  
</html>