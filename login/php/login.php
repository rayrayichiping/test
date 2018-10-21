<?php
	session_start();
	error_reporting(0);
	require_once("link.php");
	require_once("sql.php");
	
	$user=$_POST['user'];
	$pw=$_POST['pw'];
	
	$db = new DB();
	$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db->query("SELECT * FROM member WHERE Member_Password =  '". $pw ."'
	AND Member_Account = '" . $user . "'");
	while($result = $db->fetch_array())
	{
		$_SESSION['user_name'] = $result["Member_Name"];
		$_SESSION['user_stuid'] = $result["Member_StuId"];
		$_SESSION['user_acc'] = $result["Member_Account"];
		echo "Hi," . $result["Member_Name"];
	}
	






?>