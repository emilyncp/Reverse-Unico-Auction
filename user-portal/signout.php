<?php
	setcookie("lg_id", "", time() + (60*60*24*30));
	setcookie("lg_urid", "", time() + (60*60*24*30));
	setcookie("lg_type", "", time() + (60*60*24*30));
	header('location:index.php');
	?>