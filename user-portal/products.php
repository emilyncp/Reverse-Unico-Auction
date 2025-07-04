<?php
	include_once 'security_check.php';
	include_once'database.php';
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
	<?php include_once('title-guest.php'); ?>
</head>
<body class="home" style="background-image:none;">
    <?php include_once('top-menu.php'); ?>	
	<?php //include_once('right-menu.php'); ?>
	<div id="top" class="table-box">
		<div style="margin-top:80px;">
			<?php include_once('product_list.php'); ?>
		</div>
	</div>
	<?php include_once('signup-modal.php'); ?>
	<?php include_once('signin-modal.php'); ?>	
	
	<!-- Put your page content here! -->
	<script src="bootstrap/js/jquery-1.11.0.js"></script>
	<script src="bootstrap/js/modal.js"></script>
	<link rel="stylesheet" type="text/css" href="timezone/css/jquery.countdown.css"> 
	<script type="text/javascript" src="timezone/js/jquery.plugin.js"></script> 
	<script type="text/javascript" src="timezone/js/jquery.countdown.js"></script>
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

</script>
</body>
</html>
