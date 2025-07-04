<?php
if (!empty($_COOKIE["rua_usertype"]) && $_COOKIE["rua_usertype"] =='administrator')
{
	header('location:admin/list_product_category.php');
}
?>
	
	
