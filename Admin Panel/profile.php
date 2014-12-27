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
<h3>Profile - Admin Panel System</h3>
<p>You are logged in as: <?php echo $username; echo "[$level_name]"; ?></p>
</body>
</html>