<?php
setcookie("rua_id","",time() - (60*60*24*30));
setcookie("rua_usertype","",time() - (60*60*24*30));
header('location:index.php');
?>