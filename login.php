<?php
	require('config.php');
	include('layout/header.php');

	if(isset($_SESSION['account'])){
		header('location:index.php');
	} else{
	
		$errors=array();
		if(isset($_POST['login_submit'])){
			$account = $mysqli->real_escape_string($_POST['account']);
			$password = md5($mysqli->real_escape_string($_POST['password']));
			
			$check_user = $mysqli->query("SELECT * FROM account WHERE `account` ='$account' and `password` = '$password'"); 
			//kiem tra username da duoc dung chua
			$check_user_row = $check_user->fetch_row();
			if($check_user_row == 0){
				$errors[] = "Tài khoản hoặc mật khẩu bạn nhập không đúng";
			} else{
				
				$info_user = $mysqli->query("SELECT * FROM account WHERE account ='$account' and password = '$password'");
				$row= $info_user->fetch_object();
				$_SESSION['lock'] = TRUE;
				$_SESSION['account'] = $row->account;
				$_SESSION['fullname'] = $row->fullname;
				$_SESSION['account_id']   = $row->id;
				$_SESSION['avatar']   = $row->avatar;
				$_SESSION['unit_id'] = $row->unit_id;
				$_SESSION['status'] = $row->status;
				// lay thong tin user để chèn vào bảng online
				$account_id = $_SESSION['account_id'];
				$unit_id = $_SESSION['unit_id'];
				$sql = $mysqli->query("INSERT INTO account_online(`account_id`,`unit_id`,`time_login`) VALUES ($account_id,$unit_id,CURRENT_TIMESTAMP)");
				header('location:index.php');
			}
		}
?>
<title>Đăng nhập | Cổng thông tin kế hoạch Viettronics </title>
<body class="login tooltips">
<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="login-header text-center">
			<img src="assets/img/logo-login.png" class="logo" alt="Logo">
		</div>
		<div class="login-wrapper">
			<?php	//Đưa thông báo gặp lỗi nào
				if(count($errors) > 0){
					foreach($errors as $errors){ ?>
						<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
						  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  	<strong>Warning!</strong> <?php echo $errors ?></a>.
						</div>
			<?php	}
					unset($errors);
				}
			?>
			<form role="form" method="post">
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="text" name="account" class="form-control no-border input-lg rounded" placeholder="Nhập tên tài khoản" autofocus>
				  <span class="fa fa-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="password" class="form-control no-border input-lg rounded" placeholder="Nhập mật khẩu">
				  <span class="fa fa-unlock-alt form-control-feedback"></span>
				</div>
				<div class="form-group">
				  <div class="checkbox">
					<label>
					  <input type="checkbox" class="i-yellow-flat"> Ghi nhớ
					</label>
				  </div>
				</div>
				<div class="form-group">
					<button type="submit" name="login_submit" class="btn btn-warning btn-lg btn-perspective btn-block">ĐĂNG NHẬP</button>
				</div>
			</form>
			<p class="text-center"><strong><a href="forgotpassword.php">Quên mật khẩu?</a></strong></p>
	
		</div><!-- /.login-wrapper -->
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
</body>
<?php } ?>