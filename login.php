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
            header("location: main.php");
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
        <h1><b>登入</b></h1>
        <p>請先登入獲取權限才能使用更多功能。</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>帳號</b></span>
                <input type="text" name="username" placeholder="請輸入帳號" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div><br>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>密碼</b></span>
                <input type="password" name="password" placeholder="請輸入密碼" class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>

            <div class="input-group" id="box2">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>圖形驗證碼</b></span>
                <input type="tel" id="checknumber" class="form-control" placeholder="請輸入圖形驗證碼" />
                <span><canvas id="canvas" width="320" height="90"></canvas>
                    <br><a href="#" id="changeImg">看不清楚，更換一張</a></span>
            </div>

            <br><br>

            <div class="form-group">
                <input type="button" onClick="checkcode()" class="btn btn-outline-danger btn-lg" value="檢驗">
                <input type="submit" class="btn btn-outline-dark btn-lg" value="登入">
            </div><br>
            <p>您還沒有帳號嗎？ <a href="createAccount.php">馬上註冊帳號</a></p>
        </form>

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </div>

    <script>
        const txtArray = []

        /**生成一個隨機數**/
        function randomNum(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }
        /**生成一個隨機色**/
        function randomColor(min, max) {
            var r = randomNum(min, max);
            var g = randomNum(min, max);
            var b = randomNum(min, max);
            return "rgb(" + r + "," + g + "," + b + ")";
        }
        drawPic();
        document.getElementById("changeImg").onclick = function(e) {
            e.preventDefault();
            drawPic();
        }

        /**繪製驗證碼圖片**/
        function drawPic() {
            var canvas = document.getElementById("canvas");
            var width = canvas.width;
            var height = canvas.height;
            var ctx = canvas.getContext('2d');
            ctx.textBaseline = 'bottom';

            /**繪製背景色**/
            ctx.fillStyle = randomColor(180, 240); //顏色若太深可能導致看不清
            ctx.fillRect(0, 0, width, height);

            /**繪製文字**/
            var str = 'ABCEFGHJKLMNPQRSTWXY0123456789';
            for (var i = 0; i < 4; i++) {
                var txt = str[randomNum(0, str.length)];
                txtArray.push(txt)
                ctx.fillStyle = randomColor(50, 160); //隨機生成字體顏色
                ctx.font = randomNum(40, 70) + 'px SimHei'; //隨機生成字體大小
                var x = 50 + i * 50;
                var y = randomNum(60, 90);
                var deg = randomNum(-35, 35);
                //修改座標原點和旋轉角度
                ctx.translate(x, y);
                ctx.rotate(deg * Math.PI / 180);
                ctx.fillText(txt, 0, 0);
                //恢復座標原點和旋轉角度
                ctx.rotate(-deg * Math.PI / 180);
                ctx.translate(-x, -y);
            }
            console.log(txtArray)
            /**繪製干擾線**/
            for (var i = 0; i < 30; i++) {
                ctx.strokeStyle = randomColor(40, 180);
                ctx.beginPath();
                ctx.moveTo(randomNum(0, width), randomNum(0, height));
                ctx.lineTo(randomNum(0, width), randomNum(0, height));
                ctx.stroke();
            }

            /**繪製干擾點**/
            for (var j = 0; j < 500; j++) {
                ctx.fillStyle = randomColor(0, 255);
                ctx.beginPath();
                ctx.arc(randomNum(0, width), randomNum(0, height), 1, 0, 2 * Math.PI);
                ctx.fill();
            }
        }

        function checkcode() {
            var regex = txtArray.join('');
            var checkcode = document.getElementById('checknumber').value;
            console.log(regex)
            console.log("checkcode is " + checkcode)
            //var a = regex.exec(checkcode);
            if (regex == checkcode) {
                alert('圖形驗證碼正確無誤！！！');
            } else {
                alert('圖形驗證碼錯誤，請更換一張圖形或重新輸入。');
            }
        }
    </script>
</body>

</html>