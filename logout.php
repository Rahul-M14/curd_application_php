<?php 
 session_start();
$_SESSION['userlogout'] = null;
if (!$_SESSION['userlogout'] ) {
	header("location:userlogin.php");
}
?>
