<?php
	
	include('layout/header.php');
	$title = "Thêm lịch công tác tuần";
	$errors=array();
	$msg   =array();
	// them nguoi dung moi
	if(isset($_POST['submit_new_cal'])){
		$cal_content        = $mysqli->real_escape_string($_POST['cal_content']);
		$account_manager    = $mysqli->real_escape_string($_POST['account_manager']);
		$unit_id            = $mysqli->real_escape_string($_POST['unit_id']);
		$cal_address        = $mysqli->real_escape_string($_POST['cal_address']);
		$cal_join           = $mysqli->real_escape_string($_POST['cal_join']);
		$date               = $mysqli->real_escape_string($_POST['date']);
		$time               = $mysqli->real_escape_string($_POST['time']);
		

		
		//xu ly dữ liệu
		/** xu ly time **/
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$datetime= date('Y-m-d H:i:s', strtotime("$date $time"));
		$current_date =  date("Y-m-d H:i:s");
		if(strtotime($datetime) < strtotime($current_date)){	
			$errors[]="Ngày nhập vào không đúng";
		}
		if(count($errors) == 0){
			//chen data vao dtb
			$sql = $mysqli->query("INSERT INTO `calendar`(`cal_content`,`account_manager`,`unit_id`,`cal_join`,`cal_address`,`time`) VALUES ('$cal_content','$account_manager','$unit_id','$cal_address','$cal_join','$datetime')");
			$msg[]='Đã thêm thành công';
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
				<li><a href="#fakelink">Lịch công tác</a></li>
				<li class="active"><?php echo $title;?></li>
			</ol>
		<!-- End breadcrumb -->
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="the-box">
					<h4 class="small-title">THÊM LỊCH CÔNG TÁC TUẦN</h4>
					<form method="POST">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa  fa-bell-o"></i></span>
										<textarea name="cal_content" class="form-control"  rows="3" placeholder="Nội dung công việc" required></textarea>
									</div>
								</div>

								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-user"></i></span>
										<select data-placeholder="Chọn đơn vị..." class="form-control chosen-select" name="account_manager" required>
												<option disabled selected>Chọn người chủ trì ....</option>

												<?php $sql_a = $mysqli->query("SELECT * FROM `account`");
												while($obj_a = $sql_a->fetch_object()){
													echo '<option value="'.$obj_a->id.'">'.$obj_a->fullname.'</option>';
												}?>
											</select>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-archive"></i></span>
										<select data-placeholder="Chọn đơn vị..." class="form-control chosen-select" name="unit_id" required>
												<option disabled selected>Chọn đơn vị ....</option>

												<?php $sql_u = $mysqli->query("SELECT * FROM `unit`");
												while($obj_u = $sql_u->fetch_object()){
													echo '<option value="'.$obj_u->id.'">'.$obj_u->unit_name.'</option>';
												}?>
											</select>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa  fa-bell-o"></i></span>
										<input type="text" name="cal_address" class="form-control" placeholder="Địa điểm" required>
									</div>
								</div>

							</div>

							<div class="col-sm-6">
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa  fa-users"></i></span>
										<textarea name="cal_join" class="form-control"  rows="5" placeholder="Thành phần tham dự" required></textarea>
									</div>
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-calendar"></i></span>
										<input type="text" class="form-control" data-date-format="yy-mm-dd" name="date" id="date1" placeholder="YY-MM-DD" required>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-clock-o"></i> </span>
										<input type="text" class="form-control" placeholder="HH:MM" name="time" id="time1" required>
									</div>
								  
								</div>
								
							</div><!-- /.col-sm-6 -->
						</div><!-- /.row -->
						<button type="submit" name="submit_new_cal" id="submit_cal" class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> Thêm lịch mới</button>
					</form>
					</div>
				</div>
				<div class="col-sm-2"></div>
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
