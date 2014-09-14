<?php
	
	include('layout/header.php');
	$title = "Thêm đơn vị mới";
	$errors=array();
	$msg   =array();
	// them nguoi dung moi
	if(isset($_POST['submit_new_unit'])){
		$unit_name        = $mysqli->real_escape_string($_POST['unit_name']);
		$unit_des         = $mysqli->real_escape_string($_POST['unit_des']);
	

		
		//checking dữ liệu nhập vào ở form
		if(isset($_POST['submit_new_unit'])){

			if(strlen($_POST['unit_name']) < 6)
				$errors[] = 'Tên đơn vị quá ngắn!.';
				
		
		// kiem tra sản phẩm đã có chưa
			if(count($errors) == 0){
				$sql_check = $mysqli->query("SELECT * FROM `unit` WHERE unit_name = '$unit_name'");
				$check_unit     = $sql_check->fetch_row();
				if($check_unit == 0) {
					$sql = $mysqli->query("INSERT INTO `unit`(unit_name,unit_des) VALUES ('$unit_name','$unit_des')");
					$msg[]="Đã thêm thành công đơn vị mới";
				} else{
					$errors[] = 'Đơn vị '.$unit_name.' đã có sẵn!';
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
			if($_SESSION['status'] ==3){

		
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
			<h1 class="page-heading"><?php echo $title;?> </h1>
			<!-- End page heading -->
				
			<!-- Begin breadcrumb -->
			<ol class="breadcrumb default square rsaquo sm">
				<li><a href="index.html"><i class="fa fa-home"></i></a></li>
				<li><a href="#fakelink">Đơn vị</a></li>
				<li class="active"><?php echo $title;?></li>
			</ol>
		<!-- End breadcrumb -->
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="the-box">
					<h4 class="small-title">THÊM ĐƠN VỊ</h4>
					<form role="form" method="POST">
						<div class="row">
							<div class="col-sm-12">
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-briefcase"></i></span>
										<input type="text" name="unit_name" class="form-control" placeholder="Tên đơn vị" required>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa- fa-info-circle"></i> </span>
										<textarea name="unit_des" class="form-control"  rows="4" placeholder="Mô tả đơn vị" required></textarea>
									</div>
								  
								</div>
								
							</div><!-- /.col-sm-6 -->
						</div><!-- /.row -->
						<button type="submit" name="submit_new_unit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> Thêm đơn vị mới</button>
					</form>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
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
				<div class="col-sm-3"></div>

			</div>

		</div><!-- /.container-fluid -->
				
<br><br><br>				
<?php

include('layout/footer.php');
		}
	}
}
?>
