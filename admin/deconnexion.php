<?php
	session_start();
	require_once('assets/func.php');
     $db = connect_pdo();
	
	unset($_SESSION['login_admin']);
	unset($_SESSION['admin_id']);
	die('<meta http-equiv="refresh" content="0; url=./">');