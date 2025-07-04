<?php
include_once('../../database.php');
$pd_name=DataBase::RealEscape($_POST['pd_name']);
$productpic=$_FILES["productpic"]["name"];
$pd_amount=$_POST['pd_mrp'];
$pd_bidamount=$_POST['pd_tokenamount'];
$pd_startdate=$_POST['pd_startdate'];
$pd_enddate=$_POST['pd_enddate'];
$pd_startingtime=$_POST['pd_startingtime'];
$pd_endingtime=$_POST['pd_endingtime'];
$pd_status='new';
$pc_id=$_POST['pc_id'];
$pd_id=$_POST['pd_id'];
$mode=$_POST['mode'];
if($mode=="add")
{
   $query="INSERT INTO `product`(`pc_id`,`pd_name`, `pd_amount`, `pd_bidamount`, `pd_startdate`, `pd_enddate`, `pd_startingtime`, `pd_endingtime`, `pd_uniquebidderid`, `pd_uniquebidamount`, `pd_status`) 
   VALUES ('$pc_id','$pd_name','$pd_amount','$pd_bidamount','$pd_startdate','$pd_enddate','$pd_startingtime','$pd_endingtime','null','null','$pd_status')";	
   $productid=DataBase::ExecuteQueryReturnID($query);
   $filename = "../../images/products/".$productid.".jpg";
   move_uploaded_file($_FILES['productpic']['tmp_name'], $filename);
   header("Location:../manage_product.php?pc_id=$pc_id&msg=addsuccess");
}
else if($mode=="edit")
{
	if($productpic!=null){
		$query=("UPDATE `product` 
		SET `pd_name`='$pd_name',`pd_amount`='$pd_amount',`pd_bidamount`='$pd_bidamount',`pd_startdate`='$pd_startdate',`pd_enddate`='$pd_enddate',`pd_startingtime`='$pd_startingtime',`pd_endingtime`='$pd_endingtime'
		where pd_id='$pd_id'");
		$filename = "../../images/products/".$pd_id.".jpg";
		move_uploaded_file($_FILES['productpic']['tmp_name'], $filename);
	}else{
		$query=("UPDATE `product` 
		SET `pd_name`='$pd_name',`pd_amount`='$pd_amount',`pd_bidamount`='$pd_bidamount',`pd_startdate`='$pd_startdate',`pd_enddate`='$pd_enddate',`pd_startingtime`='$pd_startingtime',`pd_endingtime`='$pd_endingtime'
		where pd_id='$pd_id'");
		DataBase::ExecuteQuery($query);
	}
   header("Location:../list_product_step_2.php?pc_id=$pc_id&msg=editsuccess");
}
else if($mode=="delete")
{
	$query=("delete from  `product`
	where pd_id='$pd_id'");
	DataBase::ExecuteQuery($query);
   header("Location:../list_product_step_2.php?pc_id=$pc_id&msg=deletesuccess");
}
?>