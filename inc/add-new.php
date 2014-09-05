<?php
	session_start();
	include('../config.php');
	//them moi nguoi dung
	if(isset($_SESSION['submit_new_user'])$_GET['action'] == 'taikhoan'){
		if(isset($_POST['add_submit'])){
			$taikhoan        = $mysqli->real_escape_string($_POST['taikhoan']);
			$matkhau         = md5($mysqli->real_escape_string($_POST['matkhau']));
			$hoten           = $mysqli->real_escape_string($_POST['hoten']);
	        $status  	     = $mysqli->real_escape_string($_POST['status']);

			
			//checking dữ liệu nhập vào ở form
			if(isset($_POST['add_submit'])){

				if(!empty($_POST['taikhoan']) && (strlen($_POST['taikhoan']) > 20 || strlen($_POST['taikhoan']) < 6))
					$errors[] = 'Tài khoản giới hạn 6~20 ký tự.';

				if(!empty($_POST['taikhoan']) && !preg_match('#^[a-z0-9]+$#i', $_POST['taikhoan']))
					$errors[] = 'Tài khoản chỉ chứa ký tự: aA-zZ, 0-9';
					
				if((!empty($_POST['matkhau']) && !empty($_POST['add_repassword'])) && (strlen($_POST['matkhau']) > 14 || strlen($_POST['matkhau']) < 4))
					$errors[] = 'Mật khẩu cho phép 4~12 ký tự.';

				if((!empty($_POST['matkhau']) && !preg_match('#^[a-z0-9]+$#i', $_POST['matkhau'])))
					$errors[] = 'Mật khẩu chỉ chứa ký tự: aA-zZ, 0-9';	
					
				if(!empty($_POST['hoten']) && strlen($_POST['hoten']) <15)
					$errors[] = 'Họ tên có tối thiểu 15 kí tự';
					
			
			// kiem tra sản phẩm đã có chưa
				if(count($errors) == 0){
					$sql_check = $mysqli->query("SELECT * FROM taikhoan WHERE taikhoan = '$taikhoan'");
					$check_user     = $sql_check->fetch_row();
					if($check_user == 0) {
						$sql = $mysqli->query("INSERT INTO taikhoan(taikhoan,matkhau,hoten,status) VALUES ('$taikhoan', '$matkhau', '$hoten', '$status')");
						$msg[]="Đã thêm thành công tài khoản mới";
					} else{
						$errors[] = 'Tài khoản '.$taikhoan.' đã được sử dụng';
					}
				
				} else {
					$errors[] = ' Lỗi không thể thêm tài khoản';
				}
			}

		
		}

	}
	
?>