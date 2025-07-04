<?php
include_once 'security_check.php';
include_once '../database.php';
$uw_amount=$_POST["uw_amount"];
$page=$_POST["page"];
DataBase::ExecuteQuery("INSERT INTO `userwallet`(`ur_id`, `uw_amount`, `uw_status`, `uw_purpose`, 
`uw_date`) VALUES (".$_COOKIE['lg_urid'].",$uw_amount,'deposit','recharge',CURDATE())");
DataBase::ExecuteQuery("UPDATE `user` SET `ur_balance`=ur_balance+$uw_amount where ur_id=".$_COOKIE['lg_urid']);
header("Location:$page");

?>