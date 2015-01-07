<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 25.12.2014 г.
 * Time: 22:41 ч.
 */

include 'connect.php';

include 'functions.php';

session_destroy();

header('location: index.php');