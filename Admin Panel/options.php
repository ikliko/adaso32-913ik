<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 29.12.2014 г.
 * Time: 02:04 ч.
 */

include 'connect.php';
include 'functions.php';

$u_id = $_GET['u_id'];
$u_type = $_GET['u_type'];
$type = $_GET['type'];

if($type == "user") {
    if ($u_type == 'a') {
        mysql_query("UPDATE `users` SET `type`='d' WHERE `id`=$u_id");
        header("location: admin.php?type=user");
    } else if ($u_type == 'd') {
        mysql_query("UPDATE `users` SET `type`='a' WHERE `id`=$u_id");
        header("location: admin.php?type=user");
    }
} else if($type == "key") {
    if($u_type == 'a') {
        mysql_query("UPDATE `activate_keys` SET `type`='d' WHERE `id`=$u_id");
        header("location: admin.php?type=key");
    } else if($u_type == 'd') {
        mysql_query("UPDATE `activate_keys` SET `type`='a' WHERE `id`=$u_id");
        header("location: admin.php?type=key");
    }
}