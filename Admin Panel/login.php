<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Social Units</title>
    <link href="style/loginStyler.css" rel="stylesheet" />
</head>
<body>
<?php include 'connect.php'; ?>
<?php include 'functions.php'; ?>
<header>
    <?php include 'title_bar.php'; ?>
</header>

<form action="" method="post">
    <?php
    if(isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = sha1(htmlspecialchars($_POST['password']), "#@!00a");

        if(empty($username) or empty($password)) {
            echo "<p>Missing fields.</p>";
        } else {
            $check_login = mysql_query("SELECT id, type FROM users WHERE username='$username' AND password='$password'");
            if(mysql_num_rows($check_login) == 1) {
                $run = mysql_fetch_array($check_login);
                $user_id = $run['id'];
                $type = $run['type'];
                if($type == 'd') {
                    echo "<p>Your account is deactivated.</p>";
                } else {
                    echo "<p>Login Successful.</p>";
                    $_SESSION['user_id'] = $user_id;
                    header("location: Index.php");
                }
            } else {
                echo "<p>Incorrect username or password.</p>";
            }
        }
    }
    ?>
    <h1>Login</h1>
    <hr/>
    Username:
    <input type="text" name="username" /> <br/>
    Password:
    <input type="password" name="password"/> <br/>
    <input type="submit" name="submit" value="Login" />
</form>
</body>
</html>