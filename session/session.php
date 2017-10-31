<?php
 session_start();
 if( !isset($_SESSION['userId']) ) {
 	header("Location: http://localhost/codetech/views/accounts/login.php");
 }