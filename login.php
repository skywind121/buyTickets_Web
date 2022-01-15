<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $passcode = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND passcode='$passcode'";
    if ($stmt = $db->query($query)) {
        if (mysqli_num_rows($stmt) == 1) {
            $_SESSION['login_user'] = $username;

            echo "Login Successful";
            header("location: welcome.php");
        } else {
            echo "Login Unsuccessful";
        }
    }
    // header("location: logout.php");
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
                                    節目資訊
                                </b><span class="h3 mx-1"></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand" aria-current="page" href="http://localhost/login.php"><span class="h3 mx-1"><b>
                                    登入
                                </b></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand" aria-current="page" href="http://localhost/New.php"><span class="h3 mx-1"><b>
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
        <h2>登入</h2>
        <p>請先登入獲取權限才能使用更多功能。</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>帳號</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div><br>
            <div class="form-group">
                <label>密碼</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-dark" value="登入">
            </div><br>
            <p>還沒有帳號嗎？ <a href="createAccount.php">馬上註冊帳號</a></p>
        </form>
    </div>
</body>

</html>