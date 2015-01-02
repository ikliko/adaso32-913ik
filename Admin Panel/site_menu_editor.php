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
    include "site_menu.php";
    ?>
    </ul>
</nav>
<script src="script/MenuMaker.js"></script>
<?php
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


<?php
#$content = trim($_GET['c']);
#$pattern = "/(\<header\>.*<\/header>)(\<main\>.*\<\/main\>)(\<footer\>.*\<\/footer\>)/";
#preg_match_all($pattern, $content, $articles, PREG_SET_ORDER);
#echo "[ARTICLE:]\n\n";
#foreach($articles as $article) {
#    $lines = count($article);
#    for($i = 1; $i < $lines; $i++) {
#        $curLine = $article[$i];
#        $artPat = "/\<(\w+)\>(.*)\<\/(\w+)\>/";
#        preg_match_all($artPat, $curLine, $lineElements, PREG_SET_ORDER);
#        $elmTag = $lineElements[0][1];
#        $up = $elmTag;
#        echo "\t[$up:]\n";
#        $elmContent = $lineElements[0][2];
#        echo "\t\t$elmContent\n";
#        echo "\t[END$up]\n\n";
#    }
#}
#echo "[ENDARTICLE]";
?>