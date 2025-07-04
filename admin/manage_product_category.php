<?php
include_once('security_check_admin.php');
include_once('../database.php');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once('admin_title.php'); ?>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<body>
    <?php
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-6 offset-md-3">
						<?php
						if(!empty($_GET['msg']) && $_GET['msg']=="addsuccess"){
						?>
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Product Category Successfully Created
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
						<?php
						}else if(!empty($_GET['msg']) && $_GET['msg']=="exists"){
						?>
						<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                            <span class="badge badge-pill badge-warning">Already Exists</span>
                                Product Sub Category Already Exists
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
						</div>
						<?php
						}
						?>
                        <div class="card">
							<form action="sqlprocess/product_category_sql_process.php" method="post" autocomplete="off" >
							<?php
							if(empty($_GET['mode'])){
							?>
                                <div class="card-header">
                                    <strong class="card-title">New Product Category</strong>
                                    <a href="list_product_category.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-list"></i>&nbsp; List Product Category</a>
                                </div>
                                <div class="card-body">
									<div class="form-group">
                                        <label class="control-label mb-1">Product Category Name</label>
                                        <select class="form-control" name="pc_name" required>
											<option value="">Select Product Category</option>
											<option value="Home Appliances" >Home Appliances</option>
											<option value="Mobiles and Tabs" >Mobiles and Tabs</option>
											<option value="Mobile Accessories" >Mobile Accessories</option>
											<option value="Kitchen Accessories" >Kitchen Accessories</option>
											<option value="Lifestyle Products" >Lifestyle Products</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Product Sub Category Name</label>
                                        <input name="psc_name" type="text" placeholder="product sub category name" class="form-control" required/>
                                    </div>
									
									<input name="pc_id" value="0" type="hidden" required/>
									<input name="mode" value="add" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Save
                                    </button>
                                    <a href="list_product_category.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
								</div>
								<?php 
								}else if(!empty($_GET['mode'])&&($_GET['mode']=="edit")){
								$pc_id=$_GET['pc_id']; 
                                $query="SELECT `pc_id`, `pc_name`, `psc_name` FROM `product_category` where pc_id='$pc_id'";
                                $data=DataBase::SelectData($query);
								$row=mysqli_fetch_array($data);	
								?>
								<div class="card-header">
                                    <strong class="card-title">Edit Product Category</strong>
                                    <a href="list_product_category.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-list"></i>&nbsp; List Product Category</a>
                                </div>
                                <div class="card-body">
									<div class="form-group">
                                        <label class="control-label mb-1">Product Category Name</label>
                                        <select class="form-control" name="pc_name" required>
											<option value="">Select Product Category</option>
											<option value="Home Appliances" <?php if($row['pc_name']=="Home Appliances"){ echo "selected";}?>>Home Appliances</option>
											<option value="Mobiles and Tabs" <?php if($row['pc_name']=="Mobiles and Tabs"){ echo "selected";}?>>Mobiles and Tabs</option>
											<option value="Mobile Accessories" <?php if($row['pc_name']=="Mobile Accessories"){ echo "selected";}?>>Mobile Accessories</option>
											<option value="Kitchen Accessories" <?php if($row['pc_name']=="Kitchen Accessories"){ echo "selected";}?>>Kitchen Accessories</option>
											<option value="Lifestyle Products" <?php if($row['pc_name']=="Lifestyle Products"){ echo "selected";}?>>Lifestyle Products</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Product Sub Category Name</label>
                                        <input value="<?php echo $row["psc_name"]; ?>" name="psc_name" type="text" placeholder="product sub category name" class="form-control" required />
                                    </div>
									
									<input name="pc_id" value="<?php echo $row["pc_id"]; ?>" type="hidden" required/>
									<input name="mode" value="edit" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Edit
                                    </button>
                                    <a href="list_product_category.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
								</div>
								<?php
								}else if(!empty($_GET['mode'])&&($_GET['mode']=="delete")){
								$pc_id=$_GET['pc_id']; 
                                $query="SELECT `pc_id`, `pc_name`, `psc_name` FROM `product_category` where pc_id='$pc_id'";
                                $data=DataBase::SelectData($query);
								$row=mysqli_fetch_array($data);	
								?>
								<div class="card-header">
                                    <strong class="card-title">Delete Product Category</strong>
                                    <a href="list_product_category.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-list"></i>&nbsp; List Product Category</a>
                                </div>
                                <div class="card-body">
									<div class="form-group">
                                        <label class="control-label mb-1">Product Category Name</label>
                                        <select class="form-control" name="psc_name" required disabled>
											<option value="">Select Product Category</option>
											<option value="Home Appliances" <?php if($row['pc_name']=="Home Appliances"){ echo "selected";}?>>Home Appliances</option>
											<option value="Mobiles and Tabs" <?php if($row['pc_name']=="Mobiles and Tabs"){ echo "selected";}?>>Mobiles and Tabs</option>
											<option value="Mobile Accessories" <?php if($row['pc_name']=="Mobile Accessories"){ echo "selected";}?>>Mobile Accessories</option>
											<option value="Kitchen Accessories" <?php if($row['pc_name']=="Kitchen Accessories"){ echo "selected";}?>>Kitchen Accessories</option>
											<option value="Lifestyle Products" <?php if($row['pc_name']=="Lifestyle Products"){ echo "selected";}?>>Lifestyle Products</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Product Sub Category Name</label>
                                        <input value="<?php echo $row["psc_name"]; ?>" name="psc_name" type="text" placeholder="product sub category name" class="form-control" required disabled />
                                    </div>
									
									<input name="pc_id" value="<?php echo $row["pc_id"]; ?>" type="hidden" required/>
									<input name="mode" value="delete" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Delete
                                    </button>
                                    <a href="list_product_category.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
								</div>
								<?php
								}
								?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
    
</body>
</html>
