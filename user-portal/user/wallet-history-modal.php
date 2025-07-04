<?php
	$data=DataBase::SelectData("SELECT `ur_balance` FROM `user`  where ur_id=".$_COOKIE['lg_urid']);
	$user=mysqli_fetch_array($data);
	$data=DataBase::SelectData("SELECT `uw_id`, `ur_id`, `uw_amount`,
	 DATE_FORMAT(uw_date,'%d/%M/%Y' ) as `uw_date`,
	 `uw_status`, `uw_purpose` 
	 FROM `userwallet` 
	  where ur_id=".$_COOKIE['lg_urid']." order by uw_id desc");

?>
<div class="modal fade signup" id="wallethistoryModal" style="z-index:99999;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form method="post" action="insert_wallet.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">  
					<div class="box">
						<div class="content">
							<div class="table-responsive">
								<table class="table">
									<?php
									while($rows=mysqli_fetch_array($data)){
									?>
									<tr>
										<td><?php echo $rows['uw_date']; ?></td>
										<td><?php echo $rows['uw_purpose']; ?></td>
										<td>&#8377;  <?php echo $rows['uw_amount']; ?>.00/-</td>
									</tr>
									<?php
									}
									?>
							  </table>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">					
					<h4 class="modal-title">Balance <span style="color:red;font-weight:bold">&#8377; <?php echo $user['ur_balance']; ?></span></h4>
				</div> 
			</form>			
		</div>
	</div>
</div>
   
