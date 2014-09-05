<?php
	$title = "Thông tin người dùng";
	include('layout/header.php');

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

			<div class="row">

				<div class="col-sm-6">
					<div class="the-box">
						<h4 class="small-title">CẬP NHẬT THÔNG TIN NGƯỜI DÙNG</h4>
						<form role="form" method="POST">
						<div class="row">
							<div class="col-sm-6">
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-user"></i></span>
										<input type="email" name="email" class="form-control" value="Email người dùng" required>
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
										<span class="input-group-btn">
											<span class="btn btn-primary btn-file">
												<i class="fa fa-plus"></i><input type="file" name="avatar" >
											</span>
										</span>
										<input type="text" class="form-control" placeholder="Upload Avatar" readonly>
									</div><!-- /.input-group -->
								</div>
								
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-male"></i></span>
										<input type="text" name="fullname"  class="form-control" value="Họ và tên" required>
									</div>
								  
								</div>
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-tag"></i></span>
										<select data-placeholder="Chọn đơn vị..." class="form-control" name="unit" tabindex="2" required>
											<option value="" >Chọn đơn vị...</option>
											<?php $sql_unit = $mysqli->query("SELECT * FROM `unit`");
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
											<option value="">Loại tài khoản...</option>
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
							<button type="submit" name="submit_update_user" class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> Cập nhật thông tin</button>
						</form>
					</div>
				</div>

				<div class="col-sm-3"></div>
			</div>		
		</div><!-- /.container-fluid -->
				
<br><br><br><br><br>
<?php

include('layout/footer.php');
	}
}
?>
