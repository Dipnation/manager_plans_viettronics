<?php
	require('config.php');
	session_start();
	//xoa thong tin user tai bang account_online
	$account_id = $_SESSION['account_id'];
	$sql = $mysqli->query("DELETE FROM `account_online` WHERE `account_id` = $account_id");
	session_destroy();
	header('location:index.php');
?>