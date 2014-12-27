<html>
<head>
    <title>Register - Admin Panel</title>
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
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) or empty($password)) {
            echo "<p>Missing fields.</p>";
        } else {
            mysql_query("INSERT INTO users VALUES('', '$username', '$password', '2', 'a')");
            echo "<p>Register successful.</p>";
        }
    }
    ?>
    <h1>Register</h1>
    <hr/>
    Username:
    <input type="text" name="username" /> <br/>
    Password:
    <input type="password" name="password"/> <br/>
    <input type="submit" name="submit" value="Register" />
</form>
</body>
</html>