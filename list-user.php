<?php
	$title = "Danh sách người dùng";
	$stt =1;

	include('layout/header.php');
	//xu ly del nguoi dung
	if($_SESSION['status'] != 1 && isset($_POST['submit_del_user'])){
		$account_id = $_POST['account_id'];
		$sql_del = $mysqli->query("DELETE FROM `account` WHERE `id` = '$account_id'");
		$sql_del_online = $mysqli->query("DELETE FROM `account_online` WHERE `account_id` = '$account_id'");
		if($_SESSION['account_id'] = $account_id){
			header('Location:'.$base_url.'logout.php');
		}
	}
	//ket thuc xu ly del nguoi dung

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
			<li><a href="#fakelink">Người dùng</a></li>
			<li class="active"><?php echo $title;?></li>
		</ol>
		<!-- hien thi danh sach nguoi dung doi voi nguoi quan ly -->
		<?php if($_SESSION['status']==2){
			$unit_id = $_SESSION['unit_id'];
			$sql2 = $mysqli->query("SELECT * FROM `account_info` WHERE `unit_id` = '$unit_id' AND `status` <> '3'");
		?>
		<h4 class="small-title">Danh sách thành viên</h4>
		<div class="the-box">
			<div class="table-responsive ">
				<div class="clear"></div>
				<table id="user2" class="table table-th-block table-primary">
					<thead>
						<tr>
							<th style="width: 30px;">No</th>
							<th><center>Họ tên</center></th>
							<th><center>Email</center></th>
							<th><center>Đơn vị</center></th>
							<th><center>Loại</center></th>
							<th width="12%"><center>Chức năng</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						while($obj2 = $sql2->fetch_object()){
						echo '<tr>
							<td>'.$stt.'</td>
							<td><img src="assets/img/avatar/'.$obj2->avatar.'" class="avatar img-circle" alt="avatar">'.$obj2->fullname.'</td>
							<td>'.$obj2->email.'</td>
							<td>'.$obj2->unit_name.'</td>';
							if($obj2->status ==1){
								echo '<td>Người dùng</td>';
							}else echo '<td>Người phụ trách</td>';
							echo'<td><center><div class="btn-group">
								  	<a  class="btn btn-primary btn-xs" href="'.$base_url.'edit-user-'.$obj2->id.'.html">sửa</a> 
									<div class="btn btn-danger  btn-xs inline-popups"><a href="#text-popup-'.$obj2->id.'" data-effect="mfp-zoom-in">Xóa</a></div>
								</div></center>
								</td>';
							$stt = $stt +1;
							echo '
							<div id="text-popup-'.$obj2->id.'" class="danger-popup mfp-with-anim mfp-hide">
								<div class="row">
								<center><p>Bạn có chắc chắn muốn xóa người dùng:<br>';
								if($_SESSION['account_id'] == $obj2->id ){
									echo 'Lưu ý: Nếu xóa tài khoản này bạn sẽ bị đăng xuất khỏi hệ thống!';
								}
								echo'</p></center>
								<form method="POST">
									<div class="col-xs-1"></div>
									<div class="col-xs-7">
										<img src="assets/img/avatar/'.$obj2->avatar.'" class="avatar img-circle" alt="avatar">'.$obj2->fullname.'
									</div>
									<div class="col-xs-3">
										
										<input type="hidden" name="account_id" value="'.$obj2->id.'">
										<button type="submit" name="submit_del_user" class="btn btn-primary">Đồng ý</button>
									
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
		<?php }?>
		<!-- ket thuc hien thi dnah sach user cua nguoi phu trach -->



				<!-- hien thi danh sach nguoi dung doi voi nguoi quan ly -->
		<?php if($_SESSION['status']==3){
			$unit_id = $_SESSION['unit_id'];
			$sql2 = $mysqli->query("SELECT * FROM `account_info`");
		?>
		<h4 class="small-title">Danh sách người dùng</h4>
		<div class="the-box">
			<div class="table-responsive">
				<table id="user3" class="table table-th-block table-primary">
					<thead>
						<tr>
							<th style="width: 30px;">No</th>
							<th><center>Họ tên</center></th>
							<th><center>Email</center></th>
							<th><center>Đơn vị</center></th>
							<th><center>Loại</center></th>
							<th width="12%"><center>Chức năng</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						while($obj2 = $sql2->fetch_object()){
						echo '<tr>
							<td>'.$stt.'</td>
							<td><img src="assets/img/avatar/'.$obj2->avatar.'" class="avatar img-circle" alt="avatar">'.$obj2->fullname.'</td>
							<td>'.$obj2->email.'</td>
							<td>'.$obj2->unit_name.'</td>';
							if($obj2->status ==1){
								echo '<td>Người dùng</td>';
							}else echo '<td>Người phụ trách</td>';
							echo'<td><center><div class="btn-group">
								  	<span data-toggle="tooltip" title="" data-original-title="Chỉnh sửa"><a href="'.$base_url.'edit-user-'.$obj2->id.'.html"><i class="fa fa-pencil icon-square icon-xs icon-primary"></i></a></span>
									<span class="inline-popups" data-toggle="tooltip" title="" data-original-title="Xóa"><a href="#text-popup-'.$obj2->id.'" data-effect="mfp-zoom-in">
									<i class="fa fa-trash-o icon-square icon-xs icon-danger "></i></a></span>
								</div></center>
								</td>';;
							$stt = $stt +1;
							echo '
							<div id="text-popup-'.$obj2->id.'" class="danger-popup mfp-with-anim mfp-hide">
								<div class="row">
								<center><p>Bạn có chắc chắn muốn xóa người dùng:<br>';
								if($_SESSION['account_id'] == $obj2->id ){
									echo 'Lưu ý: Nếu xóa tài khoản này bạn sẽ bị đăng xuất khỏi hệ thống!';
								}
								echo'</p></center>
								<form method="POST">
									<div class="col-xs-1"></div>
									<div class="col-xs-7">
										<img src="assets/img/avatar/'.$obj2->avatar.'" class="avatar img-circle" alt="avatar">'.$obj2->fullname.'
									</div>
									<div class="col-xs-3">
										
										<input type="hidden" name="account_id" value="'.$obj2->id.'">
										<button type="submit" name="submit_del_user" class="btn btn-primary">Đồng ý</button>
									
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
		<?php }?>

	</div>


				


<?php

include('layout/footer.php');
	}
}
?>
