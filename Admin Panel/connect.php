<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 25.12.2014 г.
 * Time: 22:22 ч.
 */
$server = "localhost";
$account = 'myadminsql';
$password = 'trudnapar0L@';
$db = 'admin_panel';
mysql_connect($server, $account, $password);

mysql_select_db($db);

