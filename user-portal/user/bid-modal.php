<?php
	$data=DataBase::SelectData("SELECT `ur_balance` FROM `user`  where ur_id=".$_COOKIE['lg_urid']);
	$rows=mysqli_fetch_array($data);
	$balance_amount=$rows['ur_balance'];
?>
<div class="modal fade signup" id="BidModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="insert_bid.php">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Wallet Balance <span style="color:red;font-weight:bold">&#8377; <?php echo $rows['ur_balance']; ?>  /-</span></h4>
					<a class="btn btn-warning" href="#" data-toggle="modal" data-target="#walletModal">Add Cash</a>
				</div>
				<div class="modal-body">  
					<div class="box">
						<div class="content">
							<div class="form loginBox" id="bidbox">
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" value="<?php echo $_GET['sub']; ?>" name="sub"/>
				<input type="hidden" value="<?php echo $_GET['pc_id']; ?>" name="pc_id_1"/>
			</form>			
		</div>
	</div>
</div>
   
