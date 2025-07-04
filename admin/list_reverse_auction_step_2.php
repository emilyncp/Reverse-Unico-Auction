<?php
include_once('security_check_admin.php');
include_once('../database.php');
$pd_id=$_GET['pd_id'];
$query="SELECT `pd_id`, `pc_id`, `pd_name`, `pd_amount`, `pd_bidamount`, `pd_startdate`, `pd_enddate`, `pd_startingtime`, `pd_endingtime`, `pd_uniquebidderid`, `pd_uniquebidamount`, `pd_status` FROM `product` where pd_id=$pd_id";
$data=DataBase::SelectData($query);

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
                    <div class="col-md-12">
									
						<div class="card">
							<div class="card-header">
								<strong class="card-title"><th>Product Details</th></strong>
								<a href="list_reverse_auction_step_1.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>&nbsp;</th>
									 </tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_array($data)){
										?>	
										<tr>
											<td class="d-flex align-items-center justify-content-between">
												
												<ul class="list-group w-75 ml-5">
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product Name</span><h5><?php echo $row["pd_name"]; ?></h5>
												  </li>
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product MRP</span><span>&#8377;<?php echo $row["pd_amount"]; ?><span>
												  </li>
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product Token Amount</span><span>&#8377;<?php echo $row["pd_bidamount"]; ?><span>
												  </li>
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product Start Date</span><span><?php echo $row["pd_startdate"]; ?><span>
												  </li>
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product End Date</span><span><?php echo $row["pd_enddate"]; ?><span>
												  </li>
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product Starting Time</span><span><?php echo $row["pd_startingtime"]; ?><span>
												  </li>
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product Ending Time</span><span><?php echo $row["pd_endingtime"]; ?><span>
												  </li>
												  <?php 
												  if($row["pd_uniquebidderid"]!=0){
												  ?>
													<li class="list-group-item d-flex align-items-center justify-content-between">
													<span>Product Unique Bidder</span><span><?php echo $row["pd_uniquebidderid"]; ?><span>
													</li>
													<li class="list-group-item d-flex align-items-center justify-content-between">
													<span>Product Unique Bid Amount</span><span><?php echo $row["pd_uniquebidamount"]; ?><span>
													</li>
												  <?php
												  }else{
												  ?>
													<li class="list-group-item d-flex align-items-center justify-content-between">
													<span>Product Unique Bidder</span><span>No one placed bid yet<span>
													</li>
												
												  <?php 
												  } 
												  ?>	
												  <li class="list-group-item d-flex align-items-center justify-content-between">
												  <span>Product Status</span><span><?php echo $row["pd_status"]; ?><span>
												  </li>
												 
												</ul>
											</td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
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