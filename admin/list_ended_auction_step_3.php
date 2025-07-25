<?php
include_once('security_check_admin.php');
include_once('../database.php');
$pd_id=$_GET['pd_id'];
$query="SELECT `ur_name`,product_reversebidding.ur_id, `rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status` FROM `product_reversebidding` INNER JOIN `user` ON product_reversebidding.ur_id = user.ur_id where pd_id=$pd_id;";
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
								<strong class="card-title"><th>Bidding Details</th></strong>
								<a href="list_ended_auction_step_1.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Bidder Name</th>
										<th>Bid Amount</th>
										<th>Bidding Date</th>
										<th>Bidding Time</th>
										<th>Bidding Status</th>
									  </tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_array($data)){
											
										?>
										<tr >
										<?php if($row["rb_status"]=="WINNER"){ ?>
											<td class="text-danger font-weight-bold"><?php echo $row["ur_name"]; ?></td>
											<td class="text-danger font-weight-bold"><?php echo $row["rb_bidamount"]; ?></td>
											<td class="text-danger font-weight-bold"><?php echo $row["rb_biddate"]; ?></td>
											<td class="text-danger font-weight-bold"><?php echo $row["rb_bidtime"]; ?></td>
											<td class="text-danger font-weight-bold"><?php echo $row["rb_status"]; ?></td>
											<?php 
											}else{
											?>
											<td><?php echo $row["ur_name"]; ?></td>
											<td><?php echo $row["rb_bidamount"]; ?></td>
											<td><?php echo $row["rb_biddate"]; ?></td>
											<td><?php echo $row["rb_bidtime"]; ?></td>
											<td><?php echo $row["rb_status"]; ?></td>
											<?php } ?>	
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