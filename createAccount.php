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

    <?php include "topButton.php"; ?>

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
                <input type="password" name="password_confirm"  placeholder="請再次輸入密碼"  class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
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