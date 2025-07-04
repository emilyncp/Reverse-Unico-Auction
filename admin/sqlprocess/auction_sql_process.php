<?php
include_once('../../database.php');
$pd_status=$_GET['pd_status'];
$pd_id=$_GET['pd_id'];

	
$query=("UPDATE `product` 
SET `pd_status`='$pd_status'
where pd_id='$pd_id'");
DataBase::ExecuteQuery($query);

header("Location:../list_ended_auction_step_1.php?msg=$pd_status");
	
?>