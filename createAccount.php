<?php
    include "db_conn.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $passcode = mysqli_real_escape_string($db,$_POST['password']);
        $passcode_confirm = mysqli_real_escape_string($db,$_POST['password_confirm']);

        $query = "SELECT * FROM users WHERE username='$username'";
        if($stmt = $db->query($query)){
            if (mysqli_num_rows($stmt) == 1) {
                echo "Username taken. Please choose another username.";
            }
            else if ($passcode != $passcode_confirm) {
                echo "The password and confirmation password do not match.";
            }
            else {
                $query = "INSERT INTO users (username, passcode) VALUES ('$username', '$passcode')";
                if($stmt = $db->query($query)){
                    header("location: login.php");
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirm" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>