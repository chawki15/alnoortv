<?php
	session_start();
	require_once('assets/func.php');
    $db = connect();
	
	unset($_SESSION['login_admin']);
	die('<meta http-equiv="refresh" content="0; url=./">');