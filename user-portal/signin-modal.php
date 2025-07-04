<div class="modal fade signin" id="loginModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sign in</h4>
			</div>
			<div class="modal-body">  
				<div class="box">
					<div class="content">
						<div class="form loginBox">
							<form method="post" action="login_process.php">
							<input class="form-control" type="text" placeholder="Email" name="lg_uname" required />
							<input class="form-control" type="password" placeholder="Password" name="lg_password"  required />
							<button class="btn btn-blue">Signin</button>							
							</form>
							<?php
							if(!empty($_GET['status'])&& $_GET['status']=='failed')
							{
							?>
							</br>
							</br>
							<div class="alert alert-warning alert-dismissable" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden='true'>&times;</span></button>
							<strong>Warning!</strong>Invalid user details
						
						</div>
						<?php
						}
						?>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="registernow login-footer">
					<span>Not a Member Yet ? 
						<a  href="#" data-dismiss="modal" aria-hidden="true" data-toggle="modal" data-target="#signupModal">Register Now</a>
					</span>
				</div>
			</div>        
		</div>
	</div>
</div>
   
