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
<body class="home">
    <?php include_once('top-menu.php'); ?>	
	<?php // include_once('right-menu.php'); ?>
	<div id="top" class="table-box">
		<div class="vertical-center">
			<?php include_once('search-box.php'); ?>
			<h1 class="text-center caption-title">TRY YOUR LUCK NOW</h1>
			<h2><b>MAIL YOUR PRODUCT AND AUCTION DETAILS TO admin@rua.com</b></h2>
		</div>
	</div>
	<?php include_once('signup-modal.php'); ?>
	<?php include_once('signin-modal.php'); ?>	
	<!-- Put your page content here! -->
	<script src="bootstrap/js/jquery-1.11.0.js"></script>
	<script src="bootstrap/js/modal.js"></script>
	<script src="js/multirange.js"></script>
	<script type="text/javascript">
		<?php
		if(!empty($_GET['status']) &&  $_GET['status']=='failed'){
		?>
			$('#loginModal').modal('show');
		<?php
		}
		?>
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
	<script>
			$(document).ready(function(){
			var typingTimer;   
			var doneTypingInterval = 800;
			$(document).on("input","#ur_emailid",function(e) {
				e.preventDefault();
				$("#btn_save").prop('disabled', true);
				$('#py_email_valid').css("display","inline");
				clearTimeout(typingTimer);	
				if ($('#ur_emailid').val){
					typingTimer = setTimeout(function(){
						email_validation();
					},doneTypingInterval);
				}
			});
			function email_validation(){
				var ur_emailid = $("#ur_emailid").val();
				if(ur_emailid.length >= 5 && validateEmail(ur_emailid) ){
					document.getElementById('py_email_valid').innerHTML="<span style='color:orange;'>checking availability...</span>";
					$.ajax({
						type: "POST",  
						url: "emailid_checking_sql_process.php",  
						data: "ur_emailid="+ur_emailid,
						success: function(msgds){
						
							if(msgds.trim() =="exsists"){
								document.getElementById('py_email_valid').innerHTML="<span><i>"+ur_emailid+" </i> is already used !!!</span>";
								$("#btn_save").prop('disabled', true);
							}
							else{
								document.getElementById('py_email_valid').innerHTML="<span style='color:green'><i>"+ur_emailid+" </i> is available !!!</span>";
								$("#btn_save").prop('disabled', false);
							}
							
						}				
					});
				}
				else{
					document.getElementById('py_email_valid').innerHTML="<span>please enter a valid email</span>";
					$("#btn_save").prop('disabled', true);			
				}
			}
			 function validateEmail($email) {
			  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			  return emailReg.test( $email );
			}
			});
	</script>
</body>
</html>
