<?php
	include_once 'security_check.php';
	include_once '../database.php';
	$category=DataBase::SelectData("select pc_id,ucase(pc_name) as  pc_name from product_category");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 	<?php include_once('head.php'); ?>
	<?php include_once('title-user.php'); ?>
</head>
<body class="home" style="background-image:none;">
    <?php include_once('top-menu.php'); ?>	
	<?php // include_once('right-menu.php'); ?>
	<div id="top" class="table-box">
		<div style="margin-top:80px;">
			<?php include_once('product_list.php'); ?>
		</div>
	</div>
	<?php include_once('profile-modal.php'); ?>
	<?php include_once('wallet-modal.php'); ?>
	<?php include_once('wallet-history-modal.php'); ?>
	<?php include_once('bid-modal.php'); ?>
	<?php include_once('bid-details-modal.php'); ?>
	<?php include_once('write-review-modal.php'); ?>
	<?php include_once('view-review-modal.php'); ?>
	<!-- Put your page content here! -->
	<script src="../bootstrap/js/jquery-1.11.0.js"></script>
	<script src="../bootstrap/js/modal.js"></script>
	<link rel="stylesheet" type="text/css" href="../timezone/css/jquery.countdown.css"> 
	<script src="../timezone/js/jquery.plugin.js"></script> 
	<script src="../timezone/js/jquery.countdown.js"></script>
	
	 <!-- Custom Theme JavaScript -->
	<script>
		// Closes the sidebar menu
		$("#menu-close").click(function(e) {
			e.preventDefault();
			$("#menu-close").hide();
			$("#menu-toggle").show();
			$("#right-sidebar-wrapper").toggleClass("active");
		});

		// Opens the sidebar menu
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#menu-toggle").hide();
			$("#menu-close").show();
			$("#right-sidebar-wrapper").toggleClass("active");
		});
	</script>
	<script>
	$( ".timer" ).each(function( i,element ) {
		  deadline=$( element ).find( "input" ).val();
		  
		  endate = new Date(deadline); 
		$(element).countdown({until: endate});
	
	});
	$(document).ready(function(){
		$( document ).on( 'click', '.bid', function(){
			var click_bid=this;
			var dataString = 'pd_id='+ click_bid.id;
			$.ajax({
				type:"POST",
				url:"ajax/bid_show.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#bidbox").html(html);
					$('#BidModal').modal('show');
				} 
			});
		});
		$( document ).on( 'click', '.bidnew', function(){
			var click_bid=this;
			var dataString = 'pd_id='+ click_bid.id;
			$.ajax({
				type:"POST",
				url:"ajax/bid_show.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#bidbox").html(html);
					$('#BidModal').modal('show');
				} 
			});
		});
		$( document ).on( 'click', '.biddetails', function(){
			var click_bid=this;
			var dataString = 'pd_id='+ click_bid.id;
			$.ajax({
				type:"POST",
				url:"ajax/bid_details_show.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#bidboxdetails").html(html);
					$('#BidDetailsModal').modal('show');
				} 
			});
		});
		$( document ).on( 'click', '.writeareview', function(){
		
			var click_product=this;
			var temp=click_product.id;
			var tempid=temp.split("_");
			var textcontrol = document.getElementById("wr_pd_id");
			textcontrol.value =tempid[1];
		
		});
		$( document ).on( 'click', '.viewreview', function(){
			
			var click_product=this;
			var temp=click_product.id;
			var tempid=temp.split("_");
			var prodname=$("#reviewhead_"+tempid[1]).html();
			var dataString = 'pd_id='+ tempid[1];
			$.ajax({
				type:"POST",
				url:"ajax/reviews_show.php",
				data: dataString,
				cache: false,
				success: function(html){
					
				
					$("#reviewhead").html(prodname);
					$("#view_review_content").html(html);
					$('#viewreviewModal').modal('show');
				} 
			});
		});
	});

</script>
</body>
</html>
