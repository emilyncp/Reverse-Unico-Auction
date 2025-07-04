<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
			<div class="searchbox">
				<form method="GET" action="products.php" enctype="multipart/form-data" >
				<label class="text-left">Get into amazing offers !!!</label>
					<div class="form-control">
						<select id="sub" name="sub" required>
							<option value="0">--Select Product Category--</option>
							<?php
							$data=DataBase::SelectData("select distinct pc_name from product_category");
							while($rows=mysqli_fetch_array($data)){
							?>
							<option value="<?php echo $rows['pc_name'];?>"><?php echo strtoupper($rows['pc_name']);?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-control">
						<select id="cat" name="pc_id" required>
							<option value="0">--Select Product Sub Category--</option>
							<?php
							$data=DataBase::SelectData("select distinct pc_id,psc_name from product_category");
							while($rows=mysqli_fetch_array($data)){
							?>
							<option value="<?php echo $rows['pc_id'];?>"><?php echo strtoupper($rows['psc_name']);?></option>
							<?php
							}
							?>
						</select>
					</div>	
					<button class="btn btn-primary btn-block" style="padding:10px 10px;">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search Product
					</button>
				</form>
			</div>
		</div>
	</div>
</div>