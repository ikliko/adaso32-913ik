<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 31.12.2014 г.
 * Time: 21:18 ч.
 */
include 'connect.php';
include 'functions.php';

if($user_level != 1 && $user_level != 3){
    header("location: login.php");
}

if(isset($_GET['areaEditor'])) {
    $content = htmlspecialchars($_GET['areaEditor']);
    $id = $_GET['id'];
    $t = $_GET['t'];
    $title = "";
    for($i = 4; $i < strlen($t); $i++){
        $title .= $t[$i];
    }

    if(strlen($content) == 0) {
        $content = "<article>
<header><h2>Home</h2></header>
<main>Site</main>
<footer>Author</footer>
</article>";
    }

    //$sql = "UPDATE `users` SET `type`='d' WHERE `id`=$u_id";
    $sql = "UPDATE `site_page` SET `page_title`='$title', `content`='$content' WHERE `id`='$id'";
    mysql_query($sql);
    header("location: site_menu_editor.php");
    #$toBase = "";
    #$element = "";
    #for($i = 0; $i < strlen($areaEditor); $i++) {
    #    $ch = $areaEditor[$i];
    #    if($ch != " " && $ch != "\t" && $ch != "\n") {
    #        if($ch != "[" && $ch != "]" && $ch != ":") {
    #            $element .= $ch;
    #        }
    #    } else {
    #    }
    #}
}