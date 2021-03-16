<?php 

if ( isset( $_SESSION['username'] ) )
	require_once('authorized_header.php');
else
	require_once('unauthorized_header.php');

?>