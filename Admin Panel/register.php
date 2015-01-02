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
        $username = htmlspecialchars($_POST['username']);
        $password = sha1(htmlspecialchars($_POST['password']), "#!00aVBx");
        $userKey = htmlspecialchars($_POST['key']);

        if(empty($username) or empty($password)) {
            echo "<p>Missing fields.</p>";
        } else {
            $invalidKey = true;

            if(strlen($userKey) != 32) {
                echo "<p>Invalid Key.</p>";
            } else {
                $list_query = mysql_query("SELECT id, accesskey, type FROM activate_keys");
                while($run_list = mysql_fetch_array($list_query)) {
                    $u_id = $run_list['id'];
                    $validKey = $run_list['accesskey'];
                    $keyType = $run_list['type'];
                    if(($validKey == $userKey) && $keyType != "a") {
                        $invalidKey = false;
                        mysql_query("UPDATE `activate_keys` SET `type`='a' WHERE `id`=$u_id");
                        break;
                    }
                }
            }

            if(!($invalidKey)) {
                mysql_query("INSERT INTO users VALUES('', '$username', '$password', '2', 'a')");
                echo "<p>Register successful.</p>";
            }
        }
    }
    ?>
    <h1>Register</h1>
    <hr/>
    Username:
    <input type="text" name="username" /> <br/>
    Password:
    <input type="password" name="password"/> <br/>
    Key:
    <input type="text" name="key"/> <br/>
    <input type="submit" name="submit" value="Register" />
</form>
</body>
</html>