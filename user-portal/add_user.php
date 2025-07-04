<?php
include_once 'security_check.php';
include_once 'database.php';
$ur_name=$_POST["ur_name"];
$ur_emailid=$_POST["ur_emailid"];
$ur_mobile=$_POST["ur_mobile"];
if($_POST['status']=='newuser')
{
$ur_id=DataBase::ExecuteQueryReturnID("insert into user (ur_name,ur_emailid,ur_mobile,ur_balance) values('$ur_name','$ur_emailid','$ur_mobile',0)");
$lg_type='user';
$lg_status='active';
$lg_uname=$_POST["ur_emailid"];
$lg_password=$_POST["lg_password"];
DataBase::ExecuteQuery("insert into login(lg_urid,lg_type,lg_status,lg_uname,lg_password) values('$ur_id','$lg_type','$lg_status','$lg_uname','$lg_password')");
header('Location:index.php');
}
?>