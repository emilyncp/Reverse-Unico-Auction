<?php
	$products=DataBase::SelectData("select distinct product.pd_id,product.pc_id,product.pd_name,
	product.pd_amount,product.pd_bidamount,product.pd_enddate,
	product.pd_endingtime,DATE_FORMAT(product.pd_enddate,'%d/%M/%Y')as pd_enddate,pc_name,
	pd_uniquebidamount,	pd_uniquebidderid,pd_status
	from product 
	inner join product_category on product.pc_id=product_category.pc_id 
	inner join product_reversebidding on product.pd_id=product_reversebidding.pd_id
	where product_reversebidding.ur_id=".$_COOKIE['lg_urid']);
?>
<div class="container-fluid">
	<div class="row">
		<?php
		while($rows=mysqli_fetch_array($products)){
		$biddings=DataBase::SelectData("SELECT `rb_bidamount`,`rb_id`, `pd_id`, `ur_id`,rb_status 
		FROM `product_reversebidding` where  pd_id=".$rows['pd_id']."  and ur_id=".$_COOKIE['lg_urid']);
		?>
		<div class="col-md-3">
			<div class="product-box">
				<div class="product-info" style="background-image:url('../../images/products/<?php echo $rows['pd_id']?>.jpg')">
					<h2 class="product-name"><?php echo $rows['pd_name']?></h2>
					<h4 class="category-name"><?php echo $rows['pc_name']?></h4>
					<h2 class="orginalprice">&#8377;<?php echo $rows['pd_amount']?><small><i> ( original price )</i></small></h2>
					<div  class="bidamount">
					<h6>Bidding</h6>
					<h1><sup>&#8377;</sup><?php echo $rows['pd_bidamount']?>/-</h1>
					<h6>Price</h6>
					</div>
				</div>
				<div  class="timer">
					<input type="hidden" value="<?php  echo $rows['pd_enddate'];?>"/>
				</div>
				<i>bidding will end on <?php echo $rows['pd_enddate']?><?php echo $rows['pd_endingtime']?></i>
				<?php 
				if($rows['pd_uniquebidderid']==$_COOKIE['lg_urid']){
				if($rows['pd_status']=="new"){
				?>
				<h2 STYLE="color:red;text-align:center;">YOU ARE THE CURRENT WINNER!!!</h2>
				<h4 STYLE="color:BLUE;text-align:center;">WINNING BID AMOUNT IS <SPAN style="color:orange;font-weight:800;"><?php echo $rows['pd_uniquebidamount']?></SPAN> </h4>
				<?php 
				}else if($rows['pd_status']=="close"){
				?>
				<h2 STYLE="color:red;text-align:center;">YOU WON THE PRODUCT!!!</h2>
				<h4 STYLE="color:BLUE;text-align:center;">WINNING BID AMOUNT IS <SPAN style="color:orange;font-weight:800;"><?php echo $rows['pd_uniquebidamount']?></SPAN> </h4>
				<p STYLE="text-align:center;">update the shipping address to ship the product</p>
				<?php
				}else if($rows['pd_status']=="shipped"){
				?>
				<h2 STYLE="color:red;text-align:center;">YOU WON THE PRODUCT!!!</h2>
				<h4 STYLE="color:BLUE;text-align:center;">WINNING BID AMOUNT IS <SPAN style="color:orange;font-weight:800;"><?php echo $rows['pd_uniquebidamount']?></SPAN> </h4>
				<p STYLE="color:green;text-align:center;">the product is shipped to your address</p>
				<?php
				}	
				}
				if(mysqli_num_rows($biddings)>0){
				?>
				<a class="btn btn-primary btn-block btn-lg biddetails" id="<?php echo $rows['pd_id']?>">View Your Bidding History ( <?php echo mysqli_num_rows($biddings); ?> )</a>
				<?php				
				}
				?>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</div>