<html>
<head>
    <title>Site Menu</title>
    <link rel="stylesheet" href="style/loginStyler.css"/>
</head>
<body>
<?php include 'connect.php'; ?>
<?php include 'functions.php'; ?>
<header>
    <?php include 'title_bar.php'; ?>
</header>
<h3>Site Menu</h3>
<nav id="nav">
    <ul id="menu">
    <?php
    /**
     * Created by PhpStorm.
     * User: kliko
     * Date: 30.12.2014 г.
     * Time: 00:39 ч.
     */
     if($user_level != 1 && $user_level != 2 && $user_level != 3) {
        header('location: login.php');
    }
    include "site_menu.php";
    ?>
    </ul>
</nav>
<script src="script/MenuMaker.js"></script>
<?php
if(isset($_GET['input']) && !empty($_GET['input'])) {
    $tab = htmlspecialchars($_GET['input']);
    $content = '<article>
<header><h2>Home</h2></header>
<main>Site</main>
<footer>Author</footer>
</article>';
    $sql = "INSERT INTO `site_page`(`id`, `page_title`, `content`) VALUES ('', '$tab', '$content')";
    mysql_query($sql);
    header("location: site_menu_editor.php");
}

if(isset($_GET['id']) && !empty($_GET['id'])) : $id = $_GET['id']; ?>
    <form action="page_tab_content.php" method="get" id="no-style">
        <textarea name="areaEditor" cols="50" rows="20"><?php
            $content = $_GET['c'];
            $title = $_GET['t'];
            $pattern = "/\<article\>(\<header\>\<h2\>.+?\<\/h2\>\<\/header\>)(\<main\>.+?\<\/main\>)(\<footer\>.+?\<\/footer\>)\<\/article\>/";
            preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
            foreach($out as $line){
                $line1 = $line[1];
                $line2 = $line[2];
                $line3 = $line[3];
                echo "<article>\n";
                echo "$line1\n";
                echo "$line2\n";
                echo "$line3\n";
                echo "</article>";
            }
        ?></textarea>
        <input type="text" name="id" value="<?php echo $id;?>"/>
        <input type="text" name="t" value="Tab: <?php echo $title;?>" class="visible"/>
        <input type="submit" class="visible" value="Add Content"/>
    </form>
<?php endif; ?>
</body>
</html>