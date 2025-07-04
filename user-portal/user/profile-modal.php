<?php
	$data=DataBase::SelectData("SELECT `ur_id`, `ur_name`, `ur_emailid`, 
	`ur_mobile`, `lg_password` ,ur_shippingaddress
	FROM `user` 
	inner join login on login.lg_urid=user.ur_id where ur_id=".$_COOKIE['lg_urid']);
	$rows=mysqli_fetch_array($data);
								
?>
<div class="modal fade signup" id="signupModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="update_user.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">My Profile</h4>
				</div>
				<div class="modal-body">  
					<div class="box">
						<div class="content">
							<div class="form loginBox">
								<input class="form-control" type="text" placeholder="Username" value="<?php echo $rows['ur_name'] ?>" name="ur_name"/>
								<input class="form-control" type="email" placeholder="Email" value="<?php echo $rows['ur_emailid'] ?>" name="ur_emailid"/>
								<input class="form-control" type="text" placeholder="MobileNo" value="<?php echo $rows['ur_mobile'] ?>"  name="ur_mobile"/>
								<textarea class="form-control" placeholder="shipping address" rows="3" name="ur_shippingaddress" /><?php echo $rows['ur_shippingaddress'] ?></textarea>
							
								<input class="form-control" type="password" placeholder="Password" value="<?php echo $rows['lg_password'] ?>"  name="lg_password" readonly onfocus="this.removeAttribute('readonly');"/>
								
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button class="btn btn-primary">Update My Profile</button>
			</div> 
			</form>			
		</div>
	</div>
</div>
   
