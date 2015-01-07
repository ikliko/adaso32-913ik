<html>
<head>
    <title>Profile - Admin Panel</title>
    <link rel="stylesheet" href="style/loginStyler.css"/>
</head>
<body>
<?php include 'connect.php'; ?>
<?php include 'functions.php'; ?>
<header>
    <?php include 'title_bar.php'; ?>
</header>
<?php if($user_level != 1 && $user_level != 2 && $user_level != 3) {
    header('location: login.php');
}
?>
<h3>Profile - Admin Panel System</h3>
<p>You are logged in as: <?php echo $username; echo "[$level_name]"; ?></p>

<p>
<?php if($user_level == 1 || $user_level == 3): ?>
<a href="admin.php">Admin Panel</a>
<?php endif; ?>
</p>

</body>
</html>