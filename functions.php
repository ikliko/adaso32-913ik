<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 25.12.2014 г.
 * Time: 22:26 ч.
 */

session_start();

function loggedin() {
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    return true;
} else {
    return false;
}
}

if(loggedin()) {
    $my_id = $_SESSION['user_id'];
    $user_query = mysql_query("SELECT username, user_level, type, points FROM  users WHERE id='$my_id'");
    $run_user = mysql_fetch_array($user_query);
    $username = $run_user['username'];
    $user_level = $run_user['user_level'];
    $type = $run_user['type'];
    $points = $run_user['points'];
    $query_level = mysql_query("SELECT name FROM user_level WHERE id='$user_level'");
    $run_level = mysql_fetch_array($query_level);
    $level_name = $run_level['name'];
}