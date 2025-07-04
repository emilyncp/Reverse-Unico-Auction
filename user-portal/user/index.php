<?php
	include_once 'security_check.php';
	include_once'../database.php';
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
<body class="home">
    <?php include_once('top-menu.php'); ?>	
	<div id="top" class="table-box">
		<div class="vertical-center">
			<?php include_once('search-box.php'); ?>
			<h1 class="text-center caption-title">TRY YOUR LUCK NOW</h1><br>
			<h2><b>MAIL YOUR PRODUCT AND AUCTION DETAILS TO admin@rua.com</b></h2>
		</div>
	</div>
	<?php include_once('profile-modal.php'); ?>
	<?php include_once('wallet-modal.php'); ?>
	<?php include_once('wallet-history-modal.php'); ?>
	
	<!-- Put your page content here! -->
	<script src="../bootstrap/js/jquery-1.11.0.js"></script>
	<script src="../bootstrap/js/modal.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
          	$("#sub").change(function(){
				var id=$(this).val();
				var dataString = 'sub='+id;
				$.ajax({
					type: "POST",
					url: "list_categories.php",
					data: dataString,
					cache: false,
					success: function(html){
                    	$("#cat").html(html);
				    } 
				});
			});
        });
    </script>
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
</body>
</html>
