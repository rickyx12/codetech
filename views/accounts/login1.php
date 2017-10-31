<?php
	session_start();
	require "../../vendor/autoload.php";

	use Codetech\database;
	use Codetech\Bcrypt;

	$username = $_POST['username'];
	$password = $_POST['password'];

	$db = new database;

	$hash = $db->selectNow("users","password","username",$username);

	if( $hash != null || $hash != "" ) {
		 if( Bcrypt::checkPassword($password,$hash) ) {
		 	$_SESSION['userId'] = $db->selectNow('users','id','username',$username);
		 	header("Location: http://localhost/codetech/views/mainpage.php");
		 }else {
		 	header("Location: http://localhost/codetech/views/accounts/loginpage.php");
		 }	
	}else {
		header("Location: http://localhost/codetech/views/accounts/loginpage.php");
	}
?>
