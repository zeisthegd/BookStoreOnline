<?php
function CheckSessionStarted()
{
	session_start();
if ( isset( $_SESSION[ 'userId' ] ) && isset( $_SESSION[ 'username' ] ) ) {
  $username = isset( $_SESSION[ 'username' ] );
	return $username;
} else {
  header( "Location: DangNhap.php" );
  exit;
}
}
?>