<?php
include_once('../../database.php');
$pc_name=DataBase::RealEscape($_POST['pc_name']);
$psc_name=DataBase::RealEscape($_POST['psc_name']);
$pc_id=$_POST['pc_id'];
$mode=$_POST['mode'];
if($mode=="add")
{
    if(!DataBase::RowExists("product_category","psc_name='$psc_name'")){
		$query="INSERT INTO `product_category`(`pc_name`,`psc_name`) 
		VALUES ('$pc_name','$psc_name')";	
		DataBase::ExecuteQuery($query);
		header("Location:../manage_product_category.php?msg=addsuccess");
   }else{
	   header("Location:../manage_product_category.php?msg=exists");
   }
}
else if($mode=="edit")
{
	if(!DataBase::RowExists("product_category","pc_id!='$pc_id' and psc_name='$psc_name'")){
		$query=("update `product_category` 
		set `pc_name`='$pc_name' , `psc_name`='$psc_name'
		where pc_id='$pc_id'");
		DataBase::ExecuteQuery($query);
		header("Location:../list_product_category.php?msg=editsuccess");
	}else{
		header("Location:../list_product_category.php?msg=exists&pc_id=$pc_id&mode=edit");
	}
}
else if($mode=="delete")
{
	$query=("delete from  `product_category`
	where pc_id='$pc_id'");
	DataBase::ExecuteQuery($query);
   header("Location:../list_product_category.php?msg=deletesuccess");
}
?>