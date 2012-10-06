<?php
$re=array(1,2,3,4,5,6,7,8,);
$re=serialize($re);
$re=base64_encode($re);
$re1="jiedao";
header("location:test1.php?re=$re");
?>