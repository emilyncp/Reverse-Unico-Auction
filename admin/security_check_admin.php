<?php
if (empty($_COOKIE["rua_usertype"])){
	header('Location:../logout_process.php');
}
else if(!empty($_COOKIE["rua_usertype"]) && $_COOKIE["rua_usertype"] !="administrator"){
	header('Location:../logout_process.php');
}
?>
	
	
