<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>登入</title>

        <style type = "text/CSS">
            body{
                text-align: center;
            }
        </style>
    </head>

 
    <body>  <!---->

        <a href="http://localhost/main.php" style="text-decoration:none;"> <!--頂端頁面選擇欄-->
            <img src="/img/ticket.png" width="5%" height="10%" >
            <font color="black" size="6" >海大資工購票網</font>
        </a>|
        <a href="http://localhost/news.php" style="text-decoration:none;">
            <font color="black" size="6" >公告</font>
        </a>|
        <a href="http://localhost/login.php" style="text-decoration:none;">
            <font color="blue" size="6" ><b>登入</b></font>
        </a>|

        <form class="loginPart">
            <br><br>
            賬號<br><input type="varchar" name="loginId">
            <br><br>
            密碼<br><input type="varchar" name="loginPassword">
            <br><br>
            <input type="submit" name="loginButton" style="background-color#5393e8" value="登入">
        </form>

    </body>
  
</html>