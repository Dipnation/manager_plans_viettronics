<?php
	session_start();
	include('../config.php');
	if(isset($_GET['lock_submit'])){
		
		$email = $mysqli->real_escape_string($_GET['email']);
		$password = md5($mysqli->real_escape_string($_GET['password']));
		$check_user = $mysqli->query("SELECT * FROM account WHERE `email` ='$email' and `password` = '$password'"); 
			//kiem tra username da duoc dung chua
			$check_user_row = $check_user->fetch_row();
			if($check_user_row == 0){
				$errors[] = "Tài khoản hoặc mật khẩu bạn nhập không đúng";
			} else{
				
				$info_user = $mysqli->query("SELECT * FROM account WHERE email ='$email' and password = '$password'");
				$row= $info_user->fetch_object();
				$_SESSION['email'] = $row->email;
				$_SESSION['fullname'] = $row->fullname;
				$_SESSION['idaccount']   = $row->id;
				$_SESSION['idunit'] = $row->id_unit;
				$_SESSION['status'] = $row->status;
				$_SESSION['lock'] = TRUE;
				header('location:'.$base_url.'');
			}
	}
	
?>