<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style/loginStyler.css"/>
</head>
<body>
<?php include 'connect.php'; ?>
<?php include 'functions.php'; ?>
<header>
    <?php include 'title_bar.php'; ?>
</header>
<h3>Admin Panel</h3>
<?php
if($user_level != 1 && $user_level != 3){
    header("location: profile.php");
}
?>
<?php include 'admin_nav.php'; ?>
<p></p>
<?php
if(isset($_GET['type']) && !empty($_GET['type'])) :
if($_GET['type'] == "user") :
?>
<table>
    <tr>
        <td>ID</td>
        <td width="150px">Users</td>
        <td>Options</td>
    </tr>
<?php
$list_query = mysql_query("SELECT id, username, user_level, type FROM users");
while($run_list = mysql_fetch_array($list_query)):
$u_id = $run_list['id'];
$u_name = $run_list['username'];
$u_type = $run_list['type'];
$u_lvl = $run_list['user_level'];
$count = 1;
if($u_lvl != 3):
?>
<tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $u_name; ?></td>
    <td>
<?php
if($u_type == 'a') : ?>
    <a href="options.php?u_id=<?php echo $u_id; ?>&u_type=<?php echo $u_type; ?>&type=user" id="Activated">Deactivate</a>
<?php else : ?>
    <a href="options.php?u_id=<?php echo $u_id; ?>&u_type=<?php echo $u_type; ?>&type=user" id="Deactivated">Activate</a>
<?php endif; ?>
    </td>
    <td>
        <a href="options.php?u_id=<?php echo $u_id; ?>&u_type=user&type=delete">Delete</a>
    </td>
</tr>
<?php endif; ?>
<?php endwhile;?>
</table>
<?php elseif($_GET['type'] == "key"): ?>
    <table>
        <tr>
            <td>ID</td>
            <td width="150px">Keys</td>
            <td>Options</td>
        </tr>
        <?php
        $id = 1;
        $list_query = mysql_query("SELECT id, accesskey, type FROM activate_keys");
        while($run_list = mysql_fetch_array($list_query)):
            $u_id = $run_list['id'];
            $u_name = $run_list['accesskey'];
            $u_type = $run_list['type'];
            ?>
            <tr>
                <td><?php echo $id++; ?></td>
                <td><?php echo $u_name; ?></td>
                <td>
                    <?php
                    if($u_type == 'a') : ?>
                        <a href="options.php?u_id=<?php echo $u_id; ?>&u_type=<?php echo $u_type; ?>&type=key">Deactivate</a>
                    <?php else : ?>
                        <a href="options.php?u_id=<?php echo $u_id; ?>&u_type=<?php echo $u_type; ?>&type=key">Activate</a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="options.php?u_id=<?php echo $u_id; ?>&u_type=key&type=delete">Delete</a>
                </td>
                <td>
                    <?php if($u_type == 'a'): ?>
                        <span id="Activated">Activated</span>
                    <?php else : ?>
                        <span id="Deactivated">Deactivated</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile;?>
    </table>
<?php endif; ?>
<?php endif; ?>
<?php include 'footer.php'?>
</body>
</html>