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
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
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

    <?php include "topButton.php"; ?>

    <div class="wrapper">
        <h2>登入</h2>
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
                <input type="password" name="password"  placeholder="請輸入密碼"  class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br>

            <div class="input-group" id="box2">
                <span class="input-group-text" id="inputGroup-sizing-default"><b>圖形驗證碼</b></span>
                <input type="tel" class="form-control" placeholder="請輸入圖形驗證碼" />
                <span><canvas id="canvas" width="320" height="90"></canvas>
                    <br><a href="#" id="changeImg">看不清，換一張</a></span>
            </div>

            <br><br>

            <div class="input-group mb-3">
                <input type="submit" class="btn btn-outline-dark btn-lg" value="登入">
            </div><br>
            <p>您還沒有帳號嗎？ <a href="createAccount.php">馬上註冊帳號</a></p>
        </form>
    
    </div>

    <script>
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
            var str = 'ABCEFGHJKLMNPQRSTWXY123456789';
            for (var i = 0; i < 4; i++) {
                var txt = str[randomNum(0, str.length)];
                ctx.fillStyle = randomColor(50, 160); //隨機生成字體顏色
                ctx.font = randomNum(40, 70) + 'px SimHei'; //隨機生成字體大小
                var x = 40 + i * 50;
                var y = randomNum(75, 95);
                var deg = randomNum(-35, 35);
                //修改座標原點和旋轉角度
                ctx.translate(x, y);
                ctx.rotate(deg * Math.PI / 180);
                ctx.fillText(txt, 0, 0);
                //恢復座標原點和旋轉角度
                ctx.rotate(-deg * Math.PI / 180);
                ctx.translate(-x, -y);
            }

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
        
    </script>

</body>

</html>