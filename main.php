<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
    <title>海大資工售票網</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    
    <?php include "topButton.php"; ?>

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