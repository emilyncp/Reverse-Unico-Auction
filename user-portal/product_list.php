<?php
	include_once'database.php';
	$sub=$_GET['sub'];
	$pc_id=$_GET['pc_id'];
	if($pc_id!='0'){
	$category=DataBase::SelectData("select product.pd_id,product.pc_id,product.pd_name,
	product.pd_amount,product.pd_bidamount,product.pd_enddate,product.pd_endingtime,
	DATE_FORMAT(product.pd_enddate,'%d/%b/%Y')as pd_enddate,
	DATE_FORMAT(product.pd_endingtime,'%h:%i %p')as pd_endingtime_1,
	pc_name 
	from product 
	inner join product_category on product.pc_id=product_category.pc_id 
	where product.pd_startdate<=CURDATE() 
	AND product.pd_enddate>=CURDATE()AND product_category.pc_id=$pc_id");
	}
	else if($sub =='0' && $pc_id=='0'  ) {
		
	$category=DataBase::SelectData("select product.pd_id,product.pc_id,product.pd_name,
	product.pd_amount,product.pd_bidamount,product.pd_enddate,
	product.pd_endingtime,DATE_FORMAT(product.pd_enddate,'%d/%b/%Y')as pd_enddate,
	DATE_FORMAT(product.pd_endingtime,'%h:%i %p')as pd_endingtime_1,
	pc_name 
	from product 
	inner join product_category on product.pc_id=product_category.pc_id 
	where product.pd_startdate<=CURDATE() AND product.pd_enddate>=CURDATE()");
	}else if($sub!='0' && $pc_id=='0'  ) {
	$category=DataBase::SelectData("select product.pd_id,product.pc_id,product.pd_name,
	product.pd_amount,product.pd_bidamount,product.pd_enddate,
	product.pd_endingtime,DATE_FORMAT(product.pd_enddate,'%d/%b/%Y')as pd_enddate,
	DATE_FORMAT(product.pd_endingtime,'%h:%i %p')as pd_endingtime_1,
	pc_name from product 
	inner join product_category on product.pc_id=product_category.pc_id and pc_name='$sub'
	where product.pd_startdate<=CURDATE() AND product.pd_enddate>=CURDATE() ");
	}
	?>
<div class="container-fluid">
	<div class="row">
		<?php
		while($rows=mysqli_fetch_array($category)){
		?>
		<div class="col-md-3">
			<div class="product-box">
				<div class="product-info" style="background-image:url('../images/products/<?php echo $rows['pd_id']?>.jpg')">
					<h2 class="product-name"><?php echo $rows['pd_name']?></h2>
					<h4 class="category-name"><?php echo $rows['pc_name']?></h4>
					<h2 class="orginalprice">&#8377;<?php echo $rows['pd_amount']?><small><i> ( original price )</i></small></h2>
					
					<div  class="bidamount">
					<h6>Now</h6>
					<h1><sup>&#8377;</sup><?php echo $rows['pd_bidamount']?>/-</h1>
					<h6>Only</h6>
					</div>
				
				</div>
				<div  class="timer">
					<input type="hidden" value="<?php  echo $rows['pd_enddate'];?> <?php echo $rows['pd_endingtime']?>"/>
				</div>
					<i>bidding will end on <?php echo $rows['pd_enddate']?>&nbsp;&nbsp;<?php echo $rows['pd_endingtime_1']?></i>
				
					<a class="btn btn-primary btn-block btn-lg"  data-toggle="modal" data-target="#loginModal">Bid & Try Your Luck Now</a>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</div>