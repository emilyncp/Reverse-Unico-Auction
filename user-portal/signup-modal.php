<div class="modal fade signup" id="signupModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sign up</h4>
			</div>
			<div class="modal-body">  
				<div class="box">
					<div class="content">
						<div class="form loginBox">
							<form method="post" action="add_user.php">
								<input class="form-control" type="text" placeholder="Username" name="ur_name" required />
								<div class="form-group" style="position:relative;">
								 <span id="py_email_valid" style="font-weight:bold;color:red;position:absolute;right:0px;top:-20px;display:none;"></span>
			
								<input class="form-control" type="email" placeholder="Email" name="ur_emailid" id="ur_emailid" required/>
								</div>
								<input class="form-control" type="text" placeholder="MobileNo" name="ur_mobile" required />
								<input class="form-control" type="password" placeholder="Password" name="lg_password" required />
								<input type="hidden" name="status" value="newuser">
								<button class="btn btn-blue" id="btn_save">Signup</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="signinrnow login-footer">
					<span>already Member  ? 
						<a  href="#" data-dismiss="modal" aria-hidden="true" data-toggle="modal" data-target="#loginModal">Sign in</a>
					</span>
				</div>
			</div>        
		</div>
	</div>
</div>

   
