<?php
	include_once '../../database.php';
	$pd_id=$_POST['pd_id'];
	if($pd_id!=0){
	$biddetails=DataBase::SelectData("SELECT `rb_bidamount`,`rb_id`, 
	`pd_id`, `ur_id`,rb_biddate,rb_bidtime,	rb_status FROM `product_reversebidding` where  pd_id=$pd_id and ur_id=".$_COOKIE['lg_urid']." order by rb_id desc");
	}
?>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Bid Amount</td>
				<td>Date & Time</td>
				<td>Status</td>
			</tr>
			<?php
			while($rows=mysqli_fetch_array($biddetails)){
			?>
			<tr>
				<td><?php echo $rows['rb_bidamount']; ?></td>
				<td><?php echo $rows['rb_biddate']; ?>, <?php echo $rows['rb_bidtime']; ?></td>
				<td style="color:red;"><?php echo $rows['rb_status']; ?></td>
			</tr>
			<?php
			}
			?>
	  </table>
	</div>			