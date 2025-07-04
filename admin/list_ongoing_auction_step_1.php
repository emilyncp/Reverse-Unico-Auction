<?php
include_once('security_check_admin.php');
include_once('../database.php');
$today=getdate();
$query="SELECT `pd_id`, `pc_id`,`pd_name`, `pd_amount`, `pd_bidamount`, 
`pd_startdate`, `pd_enddate`, `pd_startingtime`, `pd_endingtime`, `pd_uniquebidderid`, 
`pd_uniquebidamount`, `pd_status` ,`ur_name`, `ur_emailid`, `ur_mobile`
FROM `product`
left join user on user.ur_id= product.pd_uniquebidderid
where (SELECT CURDATE()) between `pd_startdate` and `pd_enddate`  ";
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
								<strong class="card-title"><th>Today's Auctions</th></strong>
								
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Product Details</th>
										
									  </tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_array($data)){
											
										 $total_bids=DataBase::RowCount("select count(*) from product_reversebidding where pd_id='".$row["pd_id"]."'");		
						
										?>
										<tr>
											<td>
												<ul class="list-group w-100">
													<li class="list-group-item d-flex align-items-center justify-content-between bg-info text-white">
														<b><?php echo $row["pd_name"]; ?></b>
														<span>
															<a href="list_ongoing_auction_step_2.php?pd_id=<?php echo $row["pd_id"]; ?>" class="btn btn-danger btn-sm"> Product Details</a>
															<a href="list_ongoing_auction_step_3.php?pd_id=<?php echo $row["pd_id"]; ?>" class="btn btn-warning btn-sm"></i> Bidding Details</a>
														</span>
													</li>
													<li class="list-group-item d-flex align-items-center justify-content-between">
														<b>Current Total Bids</b><b class="text-danger font-weight-bold"><?php echo $total_bids; ?></b>
													</li>
													<li class="list-group-item d-flex align-items-center justify-content-between">
														<b>Current Amount Collected</b><b class="text-danger font-weight-bold"><?php echo $total_bids ; ?> X &#8377; <?php echo $row["pd_bidamount"] ; ?> = &#8377; <?php echo $total_bids * $row["pd_bidamount"] ; ?> </b>
													</li>
													<li class="list-group-item d-flex align-items-center justify-content-between">
														<b>Actual Product Cost</b><b class="text-danger font-weight-bold">&#8377; <?php echo $row["pd_amount"]; ?></b>
													</li>
													<li class="list-group-item d-flex align-items-center justify-content-between">
														<b>Current Profit / Loss</b><b class="text-danger font-weight-bold">&#8377; <?php echo ( $total_bids * $row["pd_bidamount"]) - $row["pd_amount"]; ?></b>
													</li>
													 <?php 
													if($row["pd_uniquebidderid"]!=0){
													?>
													<li class="list-group-item d-flex align-items-center justify-content-between bg-danger">
													 <b class="text-white font-weight-bold">Current Unique Bidder</b><b class="text-white font-weight-bold"><?php echo $row["ur_name"]; ?> , <?php echo $row["ur_emailid"]; ?> , <?php echo $row["ur_mobile"]; ?></b>
													</li>
													<li class="list-group-item d-flex align-items-center justify-content-between bg-danger">
													 <b class="text-white font-weight-bold">Current Unique Bid Amount</b><b class="text-white font-weight-bold"><?php echo $row["pd_uniquebidamount"]; ?></b>
													</li>
													<?php
													}else{
													?>
													<li class="list-group-item d-flex align-items-center justify-content-center bg-danger">
													 <b class="text-white font-weight-bold">No one placed bid yet or No Unique Bidder</b>
													</li>												
													<?php 
													} 
													?>	
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
