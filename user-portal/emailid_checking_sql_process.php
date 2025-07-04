<?php
	include_once 'database.php';
	if((isset($_POST["ur_emailid"]) && !empty($_POST["ur_emailid"]))) {
		mailcheck(); 
	}
	function mailcheck(){
		$ur_emailid=$_POST["ur_emailid"];
		if(database::RowExists("login","lg_uname='$ur_emailid'")){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
	}
?>