<?php
include './JWT.php';
$token = array();
$token['id'] = 12;
$token['start_time']=time();
$token['end_time']=time() + (7 * 24 * 60 * 60);
echo $tock=JWT::encode($token, '1234567');
$token_decode = JWT::decode($tock, '1234567');
echo "<br>".$token_decode->id;
echo "<br>".$token_decode->start_time;
echo "<br>".$token_decode->end_time;
?>