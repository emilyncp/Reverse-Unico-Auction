<?php
	include_once '../../database.php';
	$pd_id=$_POST['pd_id'];
	if($pd_id!=0){
	$product=DataBase::SelectData("select product.pd_id,product.pc_id,
	product.pd_name,product.pd_amount,product.pd_bidamount,product.pd_enddate,
	product.pd_endingtime,
	DATE_FORMAT(product.pd_enddate,'%d/%M/%Y')as pd_enddate,
	pc_name from product 
	inner join product_category on product.pc_id=product_category.pc_id 
	where product.pd_startdate<=CURDATE() AND product.pd_enddate>=CURDATE()AND product.pd_id=$pd_id");
	}
	$rows=mysqli_fetch_array($product);

	$data=DataBase::SelectData("SELECT `ur_balance` FROM `user`  where ur_id=".$_COOKIE['lg_urid']);
	$rows1=mysqli_fetch_array($data);
	$balance_amount=$rows1['ur_balance'];
?>
<h1 style="color:red;text-align:center;"><?php echo $rows['pd_name']; ?> </h1>
<?php
if($balance_amount<$rows['pd_bidamount']){
?>
<h2 style="text-align:center;">You have no Sufficient Balance</h2>

<?php
}else{
?>
<h2 style="text-align:center;">Bid Now for <span style="color:red">&#8377; <?php echo $rows['pd_bidamount']; ?> /-</span></h2>
<input class="form-control" type="number" placeholder="Enter Your Bid Amount"  name="rb_bidamount"/>
<div class="modal-footer">	
	<button class="btn btn-primary btn-block">Place Your Bid Now</button>
</div> 
<?php
}
?>
<input type="hidden" value="<?php echo $rows['pd_id']; ?> " name="pd_id"/>
<input type="hidden" value="<?php echo $rows['pd_bidamount']; ?> " name="rb_bidcost"/>
<input type="hidden" value="<?php echo $rows['pc_id']; ?> " name="pc_id"/>
							