<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 29.12.2014 г.
 * Time: 02:04 ч.
 */

include 'connect.php';
include 'functions.php';

if($user_level != 1 && $user_level != 3){
    header("location: Index.php");
}

$id = $_GET['u_id'];
$type = $_GET['u_type'];
$option = $_GET['type'];

if($option == "user") {
    if ($type == 'a') {
        mysql_query("UPDATE `users` SET `type`='d' WHERE `id`=$id");
        header("location: admin.php?type=user");
    } else if ($type == 'd') {
        mysql_query("UPDATE `users` SET `type`='a' WHERE `id`=$id");
        header("location: admin.php?type=user");
    }
} else if($option == "key") {
    if($type == 'a') {
        mysql_query("UPDATE `activate_keys` SET `type`='d' WHERE `id`=$id");
        header("location: admin.php?type=key");
    } else if($type == 'd') {
        mysql_query("UPDATE `activate_keys` SET `type`='a' WHERE `id`=$id");
        header("location: admin.php?type=key");
    }
} else if($option == "delete") {
    if($type == "user") {
        mysql_query("DELETE FROM `users` WHERE `id`=$id");
        header("location: admin.php?type=user");
    } else if($type == "key") {
        mysql_query("DELETE FROM `activate_keys` WHERE `id`=$id");
        header("location: admin.php?type=key");
    }
}