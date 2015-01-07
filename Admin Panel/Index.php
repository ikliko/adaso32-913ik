<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style/loginStyler.css"/>
    <link href="../img/8.jpg" rel="shortcut icon" />
</head>
<body>
<?php include 'connect.php'; ?>
<?php include 'functions.php'; ?>
<header>
    <?php include 'title_bar.php'; ?>
</header>
<?php if(loggedin()) : ?>
<p>
<h3>
    <h3>Welcome, <?php echo $username;?></h3>
</h3>
</p>
<?php endif; ?>
</body>
</html>