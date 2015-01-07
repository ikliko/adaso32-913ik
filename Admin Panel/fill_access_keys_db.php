<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 29.12.2014 г.
 * Time: 18:47 ч.
 */
include 'connect.php';

$alphabet = array(
    1 => 'A', 2 => 'a',
    3 => 'B', 4 => 'b',
    5 => 'C', 6 => 'c',
    7 => 'D', 8 => 'd',
    9 => 'E', 10 => 'e',
    11 => 'F', 12 => 'f',
    13 => 'G', 14 => 'g',
    15 => 'H', 16 => 'h',
    17 => 'I', 18 => 'i',
    19 => 'J', 20 => 'j',
    21 => 'K', 22 => 'k',
    23 => 'L', 24 => 'l',
    25 => 'M', 26 => 'm',
    27 => 'N', 28 => 'n',
    29 => 'O', 30 => 'o',
    31 => 'P', 32 => 'p',
    33 => 'Q', 34 => 'q',
    35 => 'R', 36 => 'r',
    37 => 'S', 38 => 's',
    39 => 'T', 40 => 't',
    41 => 'U', 42 => 'u',
    43 => 'V', 44 => 'v',
    45 => 'W', 46 => 'w',
    47 => 'X', 48 => 'x',
    49 => 'Y', 50 => 'y',
    51 => 'Z', 52 => 'z',
);

$list_query = mysql_query("SELECT id, accesskey, type FROM activate_keys");
$elementCounter = 0;
while($run_list = mysql_fetch_array($list_query)){
    $elementCounter++;
}

$max = 500;

if($elementCounter == $max){
    header("location: admin.php?type=key");
}

$fill = $max - $elementCounter;
$alphaNum = true;
for($key = 0; $key < $fill; $key++) {
    $accessKey = "";
    for ($i = 0; $i < 64; $i++) {
        if ($alphaNum) {
            $alphaRand = rand(1, 52);
            $ch = $alphabet[$alphaRand];
            $accessKey .= $ch;
        } else {
            $rand = rand(0, 9);
            $accessKey .= $rand;
        }
        $num = rand(1,2);
        if($num == 1){
            $alphaNum = !$alphaNum;
        }
    }
    $sql = "INSERT INTO `activate_keys`(`id`, `accesskey`, `type`) VALUES ('', '$accessKey', 'd')";
    mysql_query($sql);
}

header("location: admin.php?type=key");
