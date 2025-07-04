<?php
	$pc_id=$_GET['pc_id'];
	if(!empty($_GET['sub'])){
	$sub=$_GET['sub'];
	}else{
		$sub="0";
	}
	if($pc_id!='0'){
	$products=DataBase::SelectData("select product.pd_id,product.pc_id,product.pd_name,
	product.pd_amount,product.pd_bidamount,product.pd_enddate,
	product.pd_endingtime,DATE_FORMAT(product.pd_enddate,'%d/%b/%Y')as pd_enddate,pc_name,
	DATE_FORMAT(product.pd_endingtime,'%h:%i %p')as pd_endingtime_1,
	pd_uniquebidamount,	pd_uniquebidderid
	from product inner join product_category on product.pc_id=product_category.pc_id 
	where product.pd_startdate<=CURDATE() AND product.pd_enddate>=CURDATE()AND product_category.pc_id=$pc_id");
	}
	else if($sub =='0' && $pc_id=='0'  ){
	$products=DataBase::SelectData("select product.pd_id,product.pc_id,product.pd_name,product.pd_amount,
	product.pd_bidamount,product.pd_enddate,product.pd_endingtime,
	DATE_FORMAT(product.pd_enddate,'%d/%b/%Y')as pd_enddate,pc_name,
	DATE_FORMAT(product.pd_endingtime,'%h:%i %p')as pd_endingtime_1,
	pd_uniquebidamount,	pd_uniquebidderid	
	from product inner join product_category on product.pc_id=product_category.pc_id 
	where product.pd_startdate<=CURDATE() AND product.pd_enddate>=CURDATE()");
	}else if($sub!='0' && $pc_id=='0'  ) {
		$products=DataBase::SelectData("select product.pd_id,product.pc_id,product.pd_name,product.pd_amount,
		product.pd_bidamount,product.pd_enddate,product.pd_endingtime,
		DATE_FORMAT(product.pd_enddate,'%d/%b/%Y')as pd_enddate,pc_name,
		DATE_FORMAT(product.pd_endingtime,'%h:%i %p')as pd_endingtime_1,
		pd_uniquebidamount,	pd_uniquebidderid	
		from product inner join product_category on product.pc_id=product_category.pc_id and pc_name='$sub'
		where product.pd_startdate<=CURDATE() AND product.pd_enddate>=CURDATE()");	
	}
	?>
<div class="container-fluid">
	<div class="row">
		<?php
		while($rows=mysqli_fetch_array($products)){
		$biddings=DataBase::SelectData("SELECT `rb_bidamount`,`rb_id`, `pd_id`, `ur_id`,rb_status 
		FROM `product_reversebidding` where  pd_id=".$rows['pd_id']."  and ur_id=".$_COOKIE['lg_urid']);
		?>
		<div class="col-md-3">
			<div class="product-box" >
				<div class="product-info" style="background-image:url('../../images/products/<?php echo $rows['pd_id']?>.jpg');">
					<h2 class="product-name" id="reviewhead_<?php echo $rows['pd_id']?>" ><?php echo $rows['pd_name']?></h2>
					<h4 class="category-name"><?php echo $rows['pc_name']?></h4>
					<h2 class="orginalprice">&#8377;<?php echo $rows['pd_amount']?><small><i> ( original price )</i></small></h2>
					<a class="writeareview" id="wr_<?php echo $rows['pd_id']?>"  href="#"  data-toggle="modal" data-target="#writereviewModal">Write Comment</a>
					<a class="viewreview" id="vr_<?php echo $rows['pd_id']?>" href="#" data-toggle="modal" data-target="#viewreviewModal"   >View Comment</a>
					<div  class="bidamount">
					<h6>Now</h6>
					<h1><sup>&#8377;</sup><?php echo $rows['pd_bidamount']?>/-</h1>
					<h6>Only</h6>
					</div>
				</div>
				<div  class="timer">
					<input type="hidden" value="<?php  echo $rows['pd_enddate'];?> <?php echo $rows['pd_endingtime']?>"/>
				</div>
				<i>bidding will end on <?php echo $rows['pd_enddate']?><?php echo $rows['pd_endingtime_1']?></i>
				<a class="btn btn-primary btn-block btn-lg bid" id="<?php echo $rows['pd_id']?>">Bid & Try Your Luck Now</a>
				<?php 
				if($rows['pd_uniquebidderid']==$_COOKIE['lg_urid']){
				?>
				<h2 STYLE="color:red;text-align:center;">YOU ARE THE CURRENT WINNER!!!</h2>
				<h4 STYLE="color:BLUE;text-align:center;">WINNING BID AMOUNT IS <SPAN style="color:orange;font-weight:800;"><?php echo $rows['pd_uniquebidamount']?></SPAN> </h4>
				<?php 
				}
				if(mysqli_num_rows($biddings)>0){
				?>
				<a class="btn btn-warning btn-block btn-lg biddetails" id="<?php echo $rows['pd_id']?>">View Your <?php echo mysqli_num_rows($biddings); ?> previous bidding details</a>
				<?php				
				}
				else{
				?>
				<a class="btn btn-success btn-block btn-lg bidnew" id="<?php echo $rows['pd_id']?>">You Didnt Bid on this item yet!!!</a>
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