<?php 	

$p = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$captcha = substr(str_shuffle(str_repeat($p, 6)), 0, 6);
echo $captcha;

?>