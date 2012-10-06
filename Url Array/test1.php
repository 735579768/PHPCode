<?php
$re=base64_decode($_REQUEST["re"]);
$re=serialize($re);
var_dump($re);
?>