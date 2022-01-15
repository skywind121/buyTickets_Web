<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $passcode = mysqli_real_escape_string($db, $_POST['password']);
    $passcode_confirm = mysqli_real_escape_string($db, $_POST['password_confirm']);

    $query = "SELECT * FROM users WHERE username='$username'";
    if ($stmt = $db->query($query)) {
        if (mysqli_num_rows($stmt) == 1) {
            echo "Username taken. Please choose another username.";
        } else if ($passcode != $passcode_confirm) {
            echo "The password and confirmation password do not match.";
        } else {
            $query = "INSERT INTO users (username, passcode) VALUES ('$username', '$passcode')";
            if ($stmt = $db->query($query)) {
                header("location: login.php");
            }
        }
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a href="http://localhost/main.php" style="text-decoration:none;">
            <img src="/img/ticket.png" width="20%" height="20%">
            <font color="white" size="6"><b>海大資工購票網</b></font>
        </a>

        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="navbar-brand" aria-current="page" href="http://localhost/main.php"><span class="h3 mx-1"><b>
                                    首頁
                                </b></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand" aria-current="page" href="http://localhost/News.php"><span class="h3 mx-1"><b>
                                    公告
                                </b></span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="navbar-brand dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="h3 mx-1"><b>
                                    活動資訊
                                </b><span class="h3 mx-1"></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost/newEvent.php">舉辦活動</a></li>
                            <li><a class="dropdown-item" href="#">查看所有活動</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">查看已購票的活動</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand" aria-current="page" href="http://localhost/login.php"><span class="h3 mx-1"><b>
                                    登入
                                </b></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand" aria-current="page" href="http://localhost/createAccount.php"><span class="h3 mx-1"><b>
                                    註冊
                                </b></span></a>
                    </li>

                </ul>
                <form class="d-flex position-absolute bottom-0 end-0 translate-middle-x">
                    <input class="form-control me-2" type="search" placeholder="輸入關鍵字" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h2>註冊</h2>
        <p>請填寫以下欄位以完成註冊。</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>帳號</b></span>
                <input type="text" name="username" placeholder="請輸入您想創建的帳號" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>密碼</b></span>
                <input type="password" name="password"  placeholder="請輸入您想創建的密碼"  class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>確認密碼</b></span>
                <input type="password" name="password"  placeholder="請再次輸入密碼"  class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>

            <div class="form-group">
                <input type="submit" class="btn btn-outline-success btn-lg" value="註冊">
                <input type="reset" class="btn btn-outline-secondary btn-lg" value="重設">
            </div><br>

            <p>您已經有帳號了嗎？ <a href="login.php">登入</a></p>
        </form>
    </div>
</body>

</html>