<div class="modal fade signup" id="writereviewModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="insert_review.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Write Your Comment</h4>
				</div>
				<div class="modal-body">  
					<div class="box">
						<div class="content">
							<div class="form loginBox">
									<textarea class="form-control" placeholder="write some comment"  name="rw_review" rows="3" required></textarea>
									<input type="hidden" name="pd_id" id="wr_pd_id" />
									<input type="hidden" name="pc_id" value="<?php echo $_GET["pc_id"]; ?>"/>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" value="<?php echo $_GET['sub']; ?> " name="sub"/>
					<button class="btn btn-primary">Submit</button>
				</div> 
			</form>
		</div>
	</div>
</div>
   
