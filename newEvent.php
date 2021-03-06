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

        <form action="ininsert.php" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>活動名稱</b></span>
                <input type="varchar" name="eventname" placeholder="請輸入活動名稱" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>門票價錢</b></span>
                <input type="int" name="ticketPrice" placeholder="請輸入門票價錢" class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>門票數量</b></span>
                <input type="int" name="numTickets" placeholder="請輸入門票數量" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>活動編號</b></span>
                <input type="int" name="eId" placeholder="請輸入活動編號" class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>


            <div class="form-group">
                <input type="submit" class="btn btn-outline-warning btn-lg" value="確定舉辦">
                <input type="reset" class="btn btn-outline-secondary btn-lg" value="重設">
            </div><br>
        </form>
    </div>

</body>

</html>