<?php
	$title = "Thêm mới người dùng";
	include('layout/header.php');
	$errors=array();
	$msg   =array();
	// them nguoi dung moi
	if(isset($_POST['submit_new_user'])){
		$email        = $mysqli->real_escape_string($_POST['email']);
		$fullname     = $mysqli->real_escape_string($_POST['fullname']);
		$pass         = md5($mysqli->real_escape_string($_POST['pass']));
		$repass       = $mysqli->real_escape_string($_POST['repass']);
        $unit  	      = $mysqli->real_escape_string($_POST['unit']);
        $status  	  = $mysqli->real_escape_string($_POST['status']);

		
		//checking dữ liệu nhập vào ở form
		if(isset($_POST['submit_new_user'])){

			if(strlen($_POST['pass']) < 6)
				$errors[] = 'Mật khẩu có tối thiểu 6 ký tự.';

			if((!empty($_POST['pass']) && !preg_match('#^[a-z0-9]+$#i', $_POST['pass'])))
				$errors[] = 'Mật khẩu chỉ chứa ký tự: aA-zZ, 0-9.';	
				
			if($_POST['pass'] != $_POST['repass'])
				$errors[] = 'Mật khẩu không khớp.';
				
		
		// kiem tra sản phẩm đã có chưa
			if(count($errors) == 0){
				$sql_check = $mysqli->query("SELECT * FROM `account` WHERE email = '$email'");
				$check_user     = $sql_check->fetch_row();
				if($check_user == 0) {
					$sql = $mysqli->query("INSERT INTO `account`(email,password,fullname,unit_id,status) VALUES ('$email','$pass','$fullname','$unit','$status')");
					$msg[]="Đã thêm thành công tài khoản mới";
				} else{
					$errors[] = 'Email '.$email.' đã được sử dụng';
				}
			
			}
		}

	}

	//kiem tra dang nhap && lock-screen
	if(empty($_SESSION['account'])){
		 	header('Location: login.php');
	} else{
		if(!isset($_SESSION['lock'])){
			header('Location: lock-screen.php');
		} else{

		
?>
<body class="tooltips">
<?php 
	
include('layout/narbar.php');
include('layout/sidebar.php');

?>
<title><?php echo $title;?> | Cổng thông tin kế hoạch Viettronics </title>
<!-- BEGIN PAGE CONTENT --> 
	<div class="page-content">

		<div class="container-fluid">
		<!-- Begin page heading -->
			<h1 class="page-heading"><?php echo $title;?> <small>Sub heading here</small></h1>
			<!-- End page heading -->
				
			<!-- Begin breadcrumb -->
			<ol class="breadcrumb default square rsaquo sm">
				<li><a href="index.html"><i class="fa fa-home"></i></a></li>
				<li><a href="#fakelink">Người dùng</a></li>
				<li class="active"><?php echo $title;?></li>
			</ol>
		<!-- End breadcrumb -->
			<?php if($_SESSION['status'] != 1){ ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="the-box">
					<h4 class="small-title">THÊM NGƯỜI DÙNG</h4>
					<form role="form" method="POST">
						<div class="row">
							<div class="col-sm-6">
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-user"></i></span>
										<input type="email" name="email" class="form-control" placeholder="Email người dùng" required>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-key"></i></span>
										<input type="password" name="pass" class="form-control" placeholder="Mật khẩu" required>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-key"></i></span>
										<input type="password" name="repass"  class="form-control" placeholder="Nhập lại mật khẩu" required>
									</div>
								  
								</div>
								
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-male"></i></span>
										<input type="text" name="fullname"  class="form-control" placeholder="Họ và tên" required>
									</div>
								  
								</div>
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-tag"></i></span>
										<select data-placeholder="Chọn đơn vị..." class="form-control" name="unit" tabindex="2" required>
											<option disabled selected>Chọn đơn vị...</option>
											<?php 
											/*
											xu ly them don vi cho nguoi dung
											Neu la nguoi phu trach dang login ( status = 2) thi chi them duoc nguoi dung cung don vi cua minh
											Neu admin dang login (status =3) thi them duoc nguoi dung o tat ca cac don vi
											*/
											if($_SESSION['status'] ==2){
												$unit_id = $_SESSION['unit_id'];
												$sql_unit = $mysqli->query("SELECT * FROM `unit` WHERE `id`='$unit_id' ");
											}elseif ($_SESSION['status'] ==3) {
												$sql_unit = $mysqli->query("SELECT * FROM `unit`");
											}
											while ($obj_unit= $sql_unit->fetch_object()) {
												echo '<option value="'.$obj_unit->id.'">'.$obj_unit->unit_name.'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<!-- *
								* Hiển thị tùy chọn loại người dùng cho admin và người quản lý
								* -->

								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-plus"></i></span>
										<select data-placeholder="Loại tài khoản..." class="form-control" name="status" tabindex="2" required>
											<option disabled selected>Loại tài khoản...</option>
											<option value="1">Người dùng thường</option>';
											<?php 
												if($_SESSION['status'] == 3){
													echo '<option value="2">Người quản lý</option>';
												}
											?>	
										</select>
									</div>
								</div>
								 <!-- kết thúc hiển thị tùy chọn -->
							</div><!-- /.col-sm-6 -->
						</div><!-- /.row -->
						<button type="submit" name="submit_new_user" class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> Thêm người dùng mới</button>
					</form>
					</div>
				</div>

				<div class="col-sm-6">
					<?php	//Đưa thông báo gặp lỗi nào
						if(count($errors) > 0){
							foreach($errors as $errors){ ?>
								<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
								  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  	<strong>Lỗi!</strong> <?php echo $errors ?></a>.
								</div>
					<?php	}
							unset($errors);
						}
					?>
					<?php	//Đưa thông báo thành công
						if(count($msg) > 0){
							foreach($msg as $msg){ ?>
								<div class="alert alert-success alert-bold-border fade in alert-dismissable">
								  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  	<strong>Thông báo!</strong> <?php echo $msg ?></a>.
								</div>
					<?php	}
							unset($msg);
						}
					?>
					
				</div>

			</div>
			<?php } ?>

		</div><!-- /.container-fluid -->
				
				
<?php

include('layout/footer.php');
	}
}
?>
