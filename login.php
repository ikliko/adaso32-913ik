<?php include 'connect.php'; ?>
<?php include 'functions.php'; ?>

<form action="" method="post">
    <?php
    if(isset($_POST['login'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = sha1(htmlspecialchars($_POST['password']), "#@!00a");

        if(empty($username) or empty($password)) {
            echo "<p>Missing fields.</p>";
        } else {
            $sql = "SELECT `id`, `type`, `points` FROM `users` WHERE `username`='$username' AND `password`='$password'";
            $check_login = mysql_query($sql);
            if(mysql_num_rows($check_login) == 1) {
                $run = mysql_fetch_array($check_login);
                $user_id = $run['id'];
                $type = $run['type'];
                if($type == 'd') {
                    echo "<p>Your account is deactivated.</p>";
                } else {
                    echo "<p>Login Successful.</p>";
                    $_SESSION['user_id'] = $user_id;
                    header("location: index.php");
                }
            } else {
                echo "<p>Incorrect username or password.</p>";
            }
        }
    } else if(isset($_POST['register'])){
        header("location: registration.php");
    } else if(isset($_POST['logout'])){
        header("location: logout.php");
    }
    ?>
    <?php if(loggedin()) :?>
        <span>Hello, <?php echo $username; ?>! Points: <?php echo $points; ?> Poruchka: Product1 2d left</span>
        <input type="submit" value="Logout" name="logout" class="submit"/>
    <?php else:?>
    Username:
    <input type="text" name="username" />
    Password:
    <input type="password" name="password"/>
    <input type="submit" name="login" value="Login" class="submit" />
    or
    <input type="submit" name="register" value="Register" class="submit"/>
    <?php endif; ?>
</form>