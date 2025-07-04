<?php
include_once 'database.php';
 
	$query="select * from login where lg_uname='".$_POST['lg_uname']."' AND lg_password='".$_POST['lg_password']."'";
	$data=database::SelectData($query);
	
	if(mysqli_num_rows($data)!=0)
	{
			$rows=mysqli_fetch_array($data);
			$lgid= $rows['lg_id'];
			$lgurid=$rows['lg_urid'];
			$lgtype= $rows['lg_type'];
			setcookie("lg_id", "$lgid", time() + (60*60*24*30));
			setcookie("lg_urid", "$lgurid", time() + (60*60*24*30));
			setcookie("lg_type", "$lgtype", time() + (60*60*24*30));
		if($rows['lg_type']=='admin')
		{
			header('location:site-admin/index.php?menu=productcategory');
		}
		else if($rows['lg_type']=='user')
		{
			header('location:user/index.php');
		}
	}
	else
	{
		header('location:index.php?status=failed');
	}
	?>