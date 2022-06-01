<?php

$str = 'abcdefghijklmnopqrstuvwxyz0123456789';
$rand_str = substr(str_shuffle(str_repeat($str, 100)), 0, 1);

echo $rand_str;

?>