<?php
include_once('security_check_admin.php');
include_once('../database.php');
$pc_id=$_GET['pc_id'];
$query="SELECT `pc_id`, `pc_name`, `psc_name` FROM `product_category` where pc_id=$pc_id";
$data=DataBase::SelectData($query);
$product_category_row=mysqli_fetch_array($data);
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
                                Product Successfully Created
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
						<?php
						}
						?>
                        <div class="card">
							<form action="sqlprocess/product_sql_process.php" method="post" autocomplete="off" enctype="multipart/form-data">
							<?php
							if(empty($_GET['mode'])){
							?>
                                <div class="card-header">
                                    <strong class="card-title">New Product @ <span class="text-danger"><?php echo $product_category_row['pc_name']; ?></span> @ <span class="text-danger"><?php echo $product_category_row['psc_name']; ?></span></strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Product Name</label>
                                        <input name="pd_name" type="text" placeholder="product name" class="form-control" required/>
                                    </div>
									<div class="form-group">
									<label class="control-label mb-1">Product Image</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="productpic" id="customFile" required/ >
											<label class="custom-file-label" for="customFile">Choose Product Image</label>
										</div>
								    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product MRP</label>
                                        <input name="pd_mrp" type="text" placeholder="product mrp" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Token Amount</label>
                                        <input name="pd_tokenamount" type="text" placeholder="product token amount" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Start Date</label>
                                        <input name="pd_startdate" type="date" placeholder="product start date" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product End Date</label>
                                        <input name="pd_enddate" type="date" placeholder="product end date" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Starting Time</label>
                                        <input name="pd_startingtime" type="time" placeholder="product starting time" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Ending Time</label>
                                        <input name="pd_endingtime" type="time" placeholder="product ending time" class="form-control" required/>
                                    </div>
									<input name="pc_id" value="<?php echo $pc_id; ?>" type="hidden" required/>
									<input name="pd_id" value="0" type="hidden" required/>
									<input name="mode" value="add" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Save
                                    </button>
                                    <a href="list_product_step_1.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
								</div>
								<?php 
								}else if(!empty($_GET['mode'])&&($_GET['mode']=="edit")){
								$pd_id=$_GET['pd_id']; 
                                $query="SELECT `pd_id`, `pc_id`, `pd_name`, `pd_amount`, `pd_bidamount`, `pd_startdate`, `pd_enddate`, `pd_startingtime`, `pd_endingtime` FROM `product` where pd_id='$pd_id'";
                                $data=DataBase::SelectData($query);
								$row=mysqli_fetch_array($data);	
								?>
								<div class="card-header">
                                    <strong class="card-title">Edit Product @ <span class="text-danger"><?php echo $product_category_row['pc_name']; ?></span> @ <span class="text-danger"><?php echo $product_category_row['psc_name']; ?></span></strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Product Name</label>
                                        <input value="<?php echo $row["pd_name"]; ?>" name="pd_name" type="text" placeholder="product name" class="form-control" required / >
                                    </div>
									<div class="form-group">
										<label class="control-label mb-1">Product Image</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="productpic" id="customFile"  />
											<label class="custom-file-label" for="customFile">Choose Product Image</label>
										</div>
								    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product MRP</label>
                                        <input value="<?php echo $row["pd_amount"]; ?>" name="pd_mrp" type="text" placeholder="product mrp" class="form-control" required />
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Token Amount</label>
                                        <input value="<?php echo $row["pd_bidamount"]; ?>"name="pd_tokenamount" type="text" placeholder="product token amount" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Start Date</label>
                                        <input value="<?php echo $row["pd_startdate"]; ?>"name="pd_startdate" type="date" placeholder="product start date" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product End Date</label>
                                        <input value="<?php echo $row["pd_enddate"]; ?>"name="pd_enddate" type="date" placeholder="product end date" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Starting Time</label>
                                        <input value="<?php echo $row["pd_startingtime"]; ?>"name="pd_startingtime" type="time" placeholder="product starting time" class="form-control" required/>
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Ending Time</label>
                                        <input value="<?php echo $row["pd_endingtime"]; ?>"name="pd_endingtime" type="time" placeholder="product ending time" class="form-control" required/>
                                    </div>
									<input name="pc_id" value="<?php echo $pc_id; ?>" type="hidden" required/>
									<input name="pd_id" value="<?php echo $row["pd_id"]; ?>" type="hidden" required/>
									<input name="mode" value="edit" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Edit
                                    </button>
                                     <a href="list_product_step_1.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
								</div>
								<?php
								}else if(!empty($_GET['mode'])&&($_GET['mode']=="delete")){
								$pd_id=$_GET['pd_id']; 
                                $query="SELECT `pd_id`, `pc_id`, `pd_name`, `pd_amount`, `pd_bidamount`, `pd_startdate`, `pd_enddate`, `pd_startingtime`, `pd_endingtime` FROM `product` where pd_id='$pd_id'";
                                $data=DataBase::SelectData($query);
								$row=mysqli_fetch_array($data);		
								?>
								<div class="card-header">
                                    <strong class="card-title">Delete Product @ <span class="text-danger"><?php echo $product_category_row['pc_name']; ?></span> @ <span class="text-danger"><?php echo $product_category_row['psc_name']; ?></span></strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Product Name</label>
                                        <input value="<?php echo $row["pd_name"]; ?>" name="pd_name" type="text" placeholder="product name" class="form-control" required disabled />
                                    </div>
									<div class="form-group">
										<label class="control-label mb-1">Product Image</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="productimage" id="customFile" >
											<label class="custom-file-label" for="customFile">Choose Product Image</label>
										</div>
								    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product MRP</label>
                                        <input value="<?php echo $row["pd_amount"]; ?>" name="pd_mrp" type="text" placeholder="product mrp" class="form-control" required disabled />
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Token Amount</label>
                                        <input value="<?php echo $row["pd_bidamount"]; ?>"name="pd_tokenamount" type="text" placeholder="product token amount" class="form-control" required disabled />
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Start Date</label>
                                        <input value="<?php echo $row["pd_startdate"]; ?>"name="pd_startdate" type="date" placeholder="product start date" class="form-control" required disabled />
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product End Date</label>
                                        <input value="<?php echo $row["pd_enddate"]; ?>"name="pd_enddate" type="date" placeholder="product end date" class="form-control" required disabled />
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Starting Time</label>
                                        <input value="<?php echo $row["pd_startingtime"]; ?>"name="pd_startingtime" type="time" placeholder="product starting time" class="form-control" required disabled />
                                    </div>
									<div class="form-group">
                                        <label class="control-label mb-1">Product Ending Time</label>
                                        <input value="<?php echo $row["pd_endingtime"]; ?>"name="pd_endingtime" type="time" placeholder="product ending time" class="form-control" required disabled />
                                    </div>
									<input name="pc_id" value="<?php echo $pc_id; ?>" type="hidden" required/>
									<input name="pd_id" value="<?php echo $row["pd_id"]; ?>" type="hidden" required/>
									<input name="mode" value="delete" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Delete
                                    </button>
                                     <a href="list_product_step_1.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
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
