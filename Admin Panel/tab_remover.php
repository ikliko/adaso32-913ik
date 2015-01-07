<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 5.1.2015 г.
 * Time: 12:32 ч.
 */

include 'connect.php';
include 'functions.php';

if(!loggedin()) {
    header("location: profile.php");
}

if(isset($_GET['t']) && !empty($_GET['t'])) {
    $id = $_GET['id'];
    $tab = $_GET['t'];
    $sql = "DELETE FROM `site_page` WHERE `id`=$id";
    mysql_query($sql);
    header("location: site_menu_editor.php");
}