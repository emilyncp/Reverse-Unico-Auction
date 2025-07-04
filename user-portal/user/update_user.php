<?php
include_once 'security_check.php';
include_once '../database.php';
$ur_name=$_POST["ur_name"];
$ur_emailid=$_POST["ur_emailid"];
$ur_mobile=$_POST["ur_mobile"];
$lg_password=$_POST["lg_password"];
$ur_shippingaddress=$_POST["ur_shippingaddress"];
DataBase::ExecuteQuery("UPDATE `user` SET `ur_name`='$ur_name',
`ur_emailid`='$ur_emailid',
`ur_mobile`='$ur_mobile',
`ur_shippingaddress`='$ur_shippingaddress'
where ur_id=".$_COOKIE['lg_urid']);
DataBase::ExecuteQuery("UPDATE `login` SET `lg_uname`='$ur_emailid',`lg_password`='$lg_password' where lg_urid=".$_COOKIE['lg_urid']);
header('Location:index.php');
?>