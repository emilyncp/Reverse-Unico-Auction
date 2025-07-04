<?php
include_once 'security_check.php';
include_once '../database.php';
$rb_bidamount=$_POST["rb_bidamount"];
$pd_id=$_POST["pd_id"];
$rb_bidcost=$_POST["rb_bidcost"];
$pc_id=$_POST["pc_id"];
$data=DataBase::SelectData("SELECT `rb_bidamount` as lowest_unique,`rb_id`, `pd_id`, `ur_id` FROM `product_reversebidding` where  pd_id=$pd_id  and rb_status='WINNER' order by rb_bidamount LIMIT 1");
$lowestbid=mysqli_fetch_array($data);
if(mysqli_num_rows($data)>0){
if($rb_bidamount<$lowestbid['lowest_unique'] && !DataBase::RowExists("product_reversebidding","pd_id=$pd_id and rb_bidamount=$rb_bidamount")){ // HAPPENS WHEN THE BIDDER BECOME THE LOWEST UNIQUE
	
	DataBase::ExecuteQuery("UPDATE `product_reversebidding` SET rb_status='LOST-STILL-CHANCE' where pd_id=$pd_id and rb_status='WINNER'");
	
	DataBase::ExecuteQuery("INSERT INTO `product_reversebidding`(`pd_id`, `ur_id`, 
	`rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status`)
	VALUES ($pd_id,".$_COOKIE['lg_urid'].",$rb_bidamount,$rb_bidcost,CURDATE(),CURTIME(),'WINNER')");
	
	DataBase::ExecuteQuery("UPDATE `product` SET `pd_uniquebidderid`=".$_COOKIE['lg_urid'].",`pd_uniquebidamount`=$rb_bidamount where pd_id=$pd_id ");
	
	DataBase::ExecuteQuery("UPDATE `user` SET `ur_balance`=ur_balance-$rb_bidcost where ur_id=".$_COOKIE['lg_urid']);

}
else if($rb_bidamount==$lowestbid['lowest_unique']){ // HAPPENS WHEN THE BIDDER BECOME EQUAL TO THE CURRENT LOWEST LOWEST UNIQUE
	
	DataBase::ExecuteQuery("UPDATE `product_reversebidding` SET rb_status='LOST-NO-HOPE' where pd_id=$pd_id and rb_status='WINNER'");
	
	DataBase::ExecuteQuery("INSERT INTO `product_reversebidding`(`pd_id`, `ur_id`, 
	`rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status`)
	VALUES ($pd_id,".$_COOKIE['lg_urid'].",$rb_bidamount,$rb_bidcost,CURDATE(),CURTIME(),'LOST-NO-HOPE')");
	
	$data=DataBase::SelectData("SELECT `rb_bidamount` as lowest_unique,`rb_id`, `pd_id`, `ur_id` FROM `product_reversebidding` where  pd_id=$pd_id and rb_status='LOST-STILL-CHANCE'  order by rb_bidamount LIMIT 1");
	$newlowestbid=mysqli_fetch_array($data);
	if(mysqli_num_rows($data>0)){
	DataBase::ExecuteQuery("UPDATE `product_reversebidding` SET rb_status='WINNER' where rb_id=".$newlowestbid['rb_id']." and rb_status='LOST-STILL-CHANCE'");
	
	DataBase::ExecuteQuery("UPDATE `product` SET `pd_uniquebidderid`=".$newlowestbid['ur_id'].",`pd_uniquebidamount`=".$newlowestbid['lowest_unique']." where pd_id=$pd_id ");
	}
	else{
			DataBase::ExecuteQuery("UPDATE `product` SET `pd_uniquebidderid`=null,`pd_uniquebidamount`=0 where pd_id=$pd_id ");
	}
	
	DataBase::ExecuteQuery("UPDATE `user` SET `ur_balance`=ur_balance-$rb_bidcost where ur_id=".$_COOKIE['lg_urid']);

}
else if( $rb_bidamount>$lowestbid['lowest_unique'] && !DataBase::RowExists("product_reversebidding","pd_id=$pd_id and rb_bidamount=$rb_bidamount")){ // HAPPENS WHEN THE BIDDER BECOME UNIQUE BUT NOT LOWEST
	
	DataBase::ExecuteQuery("INSERT INTO `product_reversebidding`(`pd_id`, `ur_id`, 
	`rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status`)
	VALUES ($pd_id,".$_COOKIE['lg_urid'].",$rb_bidamount,$rb_bidcost,CURDATE(),CURTIME(),'LOST-STILL-CHANCE')");
	DataBase::ExecuteQuery("UPDATE `user` SET `ur_balance`=ur_balance-$rb_bidcost where ur_id=".$_COOKIE['lg_urid']);

}
else if(DataBase::RowExists("product_reversebidding","pd_id=$pd_id and rb_bidamount=$rb_bidamount")){ // HAPPENS WHEN THE BIDDER BECOME  NEITHER UNIQUE NOR LOWEST
	
	DataBase::ExecuteQuery("INSERT INTO `product_reversebidding`(`pd_id`, `ur_id`, 
	`rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status`)
	VALUES ($pd_id,".$_COOKIE['lg_urid'].",$rb_bidamount,$rb_bidcost,CURDATE(),CURTIME(),'LOST-NO-HOPE')");
	
	DataBase::ExecuteQuery("UPDATE `product_reversebidding` SET rb_status='LOST-NO-HOPE' where pd_id=$pd_id and rb_bidamount=$rb_bidamount and rb_status='LOST-STILL-CHANCE'");
	
	
	DataBase::ExecuteQuery("UPDATE `user` SET `ur_balance`=ur_balance-$rb_bidcost where ur_id=".$_COOKIE['lg_urid']);
}
}
else{ // HAPPENS WHEN THE BIDDER IS THE FIRST BIDDER
	
	DataBase::ExecuteQuery("INSERT INTO `product_reversebidding`(`pd_id`, `ur_id`, 
	`rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status`)
	VALUES ($pd_id,".$_COOKIE['lg_urid'].",$rb_bidamount,$rb_bidcost,CURDATE(),CURTIME(),'WINNER')");
	DataBase::ExecuteQuery("UPDATE `product` SET `pd_uniquebidderid`=".$_COOKIE['lg_urid'].",`pd_uniquebidamount`=$rb_bidamount where pd_id=$pd_id ");
	DataBase::ExecuteQuery("UPDATE `user` SET `ur_balance`=ur_balance-$rb_bidcost where ur_id=".$_COOKIE['lg_urid']);

}
header("Location:products.php?pc_id=$pc_id");

?>