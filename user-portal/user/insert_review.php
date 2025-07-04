<?php
include_once 'security_check.php';
include_once '../database.php';
$rw_review=$_POST["rw_review"];
$pd_id=$_POST["pd_id"];
$pc_id=$_POST["pc_id"];
$sub=$_POST["sub"];
DataBase::ExecuteQuery("INSERT INTO `reviews`( `rw_review`, `ur_id`, `pd_id`, `rw_date`,rw_time) values
 ('$rw_review',".$_COOKIE['lg_urid'].",$pd_id,CURDATE(),CURTIME())");
header("Location:products.php?pc_id=$pc_id&sub=$sub");

?>