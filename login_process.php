<?php
include_once('database.php');
$ad_username=$_POST['ad_username'];
$ad_password=$_POST['ad_password'];
$query="SELECT `ad_id`, `ad_username`, `ad_password` FROM `administrator`
 where ad_username='$ad_username' AND ad_password='$ad_password'";
$data=database::SelectData($query);
if (mysqli_num_rows($data)!=0){
	$user=mysqli_fetch_array($data);
	setcookie("rua_id",$user['ad_id'],time() + (60*60*24*30));
	setcookie("rua_usertype",'administrator',time() + (60*60*24*30));
	
	header('location:admin/list_product_category.php');
	
}
else
{
		header('location:index.php?msg=failed');
}
?>
	

	