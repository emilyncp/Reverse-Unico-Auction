<?php
	$data=DataBase::SelectData("SELECT `ur_balance` FROM `user`  where ur_id=".$_COOKIE['lg_urid']);
	$rows=mysqli_fetch_array($data);
?>
<div class="modal fade signup" id="walletModal" style="z-index:9999;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="insert_wallet.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Wallet Balance <span style="color:red;font-weight:bold">&#8377; <?php echo $rows['ur_balance']; ?></span></h4>
				</div>
				<div class="modal-body">  
					<div class="box">
						<div class="content">
							<div class="form loginBox">
								<!--input class="form-control" type="number" placeholder="Add Cash to Wallet" value="<?php echo $rows['ur_name'] ?>" name="uw_amount"/-->
								<input class="form-control" type="number" placeholder="Add Cash to Wallet" value="" name="uw_amount" required />
							
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="page" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">
					<a class="btn btn-warning" href="#" data-toggle="modal" data-target="#wallethistoryModal">Wallet History</a>
					<button class="btn btn-primary">Add Cash to Wallet</button>
				</div> 
			</form>			
		</div>
	</div>
</div>
   
