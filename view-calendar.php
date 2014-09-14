<?php
	$title = "Lịch công tác tuần";
	$stt =1;

	include('layout/header.php');
	include('function.php');

	if(isset($_POST['submit_view_cal'])){
		$startDate  = $mysqli->real_escape_string($_POST['startDate']);
		$endDate    = $mysqli->real_escape_string($_POST['endDate']);
		$startDate  = date('Y/m/d H:i:s',strtotime($startDate));
		$endDate  = date('Y/m/d H:i:s',strtotime($endDate));
		$sql = $mysqli->query("SELECT * FROM `calendar_info` WHERE `time` BETWEEN '$startDate' AND '$endDate'");


	}else {

		//kiem tra neu khong co chon xem ngay thi mac dinh xem lich hop cua tuan hien tai
		$monday = startWeek(); //lay ra ngay dau tuan cua tuan hien tai
		$sunday = date('Y/m/d H:i:s',strtotime($monday . "+6 days")); //lay ra ngay cuoi cung cua tuan hien tai
		$sql = $mysqli->query("SELECT * FROM `calendar_info` WHERE `time` BETWEEN '$monday' AND '$sunday'");

	}

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
	<title><?php echo $title;?>  | Cổng thông tin kế hoạch Viettronics </title>
<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container-fluid">
		
		<!-- Begin page heading -->
		<h1 class="page-heading"><?php echo $title;?> <small>Sub heading here</small></h1>
			<!-- End page heading -->
				
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb default square rsaquo sm">
			<li><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li><a href="#fakelink">Công việc</a></li>
			<li class="active"><?php echo $title;?></li>
		</ol>
		<!-- hien thi danh sach nguoi dung doi voi nguoi quan ly -->

		<div class="the-box">
			<h4 class="small-title">Chọn ngày xem lịch công tác</h4>
			<div class="row">
				<form method="POST">
				<div class="col-sm-4">
					<div class="form-group">
					<label>Chọn ngày bắt đầu</label>
					<input type="text" class="form-control" id="datepicker1" name="startDate" placeholder="dd/mm/yy">
					</div><!-- /.form-group -->
				</div><!-- /.col-sm-6 -->
				<div class="col-sm-4">
					<div class="form-group">
					<label>Chọn ngày kết thúc</label>
					<input type="text" class="form-control" id="datepicker2" name="endDate" placeholder="dd/mm/yy">
					</div><!-- /.form-group -->
				</div><!-- /.col-sm-6 -->
				<div class="col-sm-4">
					<div class="form-group">
						<lable><br></lable>
						<button type="submit" name="submit_view_cal" id="submit_cal" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Xem lịch công tác</button>
					</div>
				</div>
				</form>
			</div><!-- /.row -->
		</div><!-- /.the-box -->
		
		<div class="the-box">
			<div class="table-responsive ">
				<div class="clear"></div>
				<table id="user2" class="table table-th-block table-primary">
					<thead>
						<tr>
							<?php 
							if(isset($_POST['submit_view_cal'])){
							 	echo '<center><h3 class="small-title">Lịch công tác tuần từ '.date('d/m/Y',strtotime($startDate)).' tới '.date('d/m/Y',strtotime($endDate)).'</h3></center>';
							} else{
								echo '<center><h3 class="small-title">Lịch công tác tuần từ '.date('d/m/Y',strtotime($monday)).' tới '.date('d/m/Y',strtotime($sunday)).'</h3></center>';
							}
							?>
						</tr>
						<tr>
							<th width="5%">Thứ / Ngày</th>
							<th><center>Thời gian</center></th>
							<th><center>Nội dung công việc</center></th>
							<th><center>Chủ trì</center></th>
							<th><center>ĐV chuẩn bị</center></th>
							<th><center>Thành phần tham dự</center></th>
							<th><center>Địa điểm</center></th>
							<th width="9%"><center>CN</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						while($obj2 = $sql->fetch_object()){
						// xu ly time
							date_default_timezone_set('Asia/Ho_Chi_Minh');
							$date_obj = strtotime($obj2->time);
							$date = date('d/m',$date_obj);
							$time = date('H:i',$date_obj);
							$day  = date('D',$date_obj); 
						echo '<tr>
							<td>'.get_date($day).'<br>'.$date.'</td>
							<td>'.$time.'</td>
							<td>'.$obj2->cal_content.'</td>
							<td>'.$obj2->fullname.'</td>
							<td>'.$obj2->unit_name.'</td>
							<td>'.$obj2->cal_join.'</td>
							<td>'.$obj2->cal_address.'</td>';
							echo'<td><center><div class="btn-group">
								  	<a  class="btn btn-primary btn-xs" href="'.$base_url.'edit-user-'.$obj2->id.'.html">sửa</a> 
									<div class="btn btn-danger  btn-xs inline-popups"><a href="#text-popup-'.$obj2->id.'" data-effect="mfp-zoom-in">Xóa</a></div>
								</div></center>
								</td>';
							$stt = $stt +1;
							echo '
							<div id="text-popup-'.$obj2->id.'" class="danger-popup mfp-with-anim mfp-hide">
								<div class="row">
								<center><p>Bạn có chắc chắn muốn xóa :<br>';
								echo'</p></center>
								<form method="POST">
									<div class="col-xs-1"></div>
									<div class="col-xs-7">
										'.$obj2->cal_content.'
									</div>
									<div class="col-xs-3">
										
										<input type="hidden" name="unit_id" value="'.$obj2->id.'">
										<button type="submit" name="submit_del_unit" class="btn btn-primary">Đồng ý</button>
									
									</div>
									<div class="col-xs-1"></div>
								</form
								</div>
							</div>
							';
						} ?>
						</tr>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
		</div>
		<!-- ket thuc hien thi dnah sach user cua nguoi phu trach -->


		
	</div>


				


<?php

include('layout/footer.php');
	}
}
?>
