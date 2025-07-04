<?php
if(!empty($_COOKIE["lg_id"]) && !empty($_COOKIE["lg_type"]) && $_COOKIE["lg_type"]=='admin')
{
header('location:../site-admin/index.php');
}
else if(empty($_COOKIE["lg_id"]) && empty($_COOKIE["lg_type"]))
{
header('location:../index.php');
}
?>