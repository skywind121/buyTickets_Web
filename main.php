<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>HelloWorld</title>
    </head>

 
    <body>

        <a href="http://localhost/main.php" style="text-decoration:none;">
            <img src="/img/ticket.png" width="5%" height="10%" >
            <font color="red" size="6">海大資工購票網</font>
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