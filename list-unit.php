<?php
	include('layout/header.php');
	$title = "Danh sách đơn vị";
	$stt =1;
	//xu ly del don vi
	if($_SESSION['status'] == 3 && isset($_POST['submit_del_unit'])){
		$unit_id = $_POST['unit_id'];
		$sql_del = $mysqli->query("DELETE FROM `unit` WHERE `id` = '$unit_id'");
	}
	//ket thuc xu ly del don vi

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
			<li><a href="#fakelink">Đơn vị</a></li>
			<li class="active"><?php echo $title;?></li>
		</ol>

		<!-- hien thi danh sach nguoi dung doi voi nguoi quan ly -->
		<?php if($_SESSION['status']==3 && !isset($_GET['id'])){
			//query lấy thông tin đơn vị và số lượng thành viên mỗi đơn vị
			$sql = $mysqli->query("SELECT * FROM `unit`");
		?>
		<h4 class="small-title">Danh sách người dùng</h4>
		<div class="the-box">
			<div class="table-responsive">
				<table id="user3" class="table table-th-block table-primary">
					<thead>
						<tr>
							<th width=6%>No</th>
							<th><center>Đơn vị</center></th>
							<th width=45%><center>Mô tả</center></th>
							<th width="12%"><center>Chức năng</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						while($obj= $sql->fetch_object()){
						echo '<tr>
							<td>'.$stt.'</td>
							<td><a href="list-unit.php?id='.$obj->id.'">'.$obj->unit_name.'</a></td>
							<td>'.$obj->unit_des.'</td>
							<td><center><div class="btn-group">
								  	<span data-toggle="tooltip" title="" data-original-title="Chỉnh sửa"><a href="'.$base_url.'edit-unit-'.$obj->id.'.html"><i class="fa fa-pencil icon-square icon-xs icon-primary"></i></a></span>
									<span class="inline-popups" data-toggle="tooltip" title="" data-original-title="Xóa"><a href="#text-popup-'.$obj->id.'" data-effect="mfp-zoom-in">
									<i class="fa fa-trash-o icon-square icon-xs icon-danger "></i></a></span>
								</div></center>
								</td>';
							$stt = $stt +1;
							echo '
							<div id="text-popup-'.$obj->id.'" class="danger-popup mfp-with-anim mfp-hide">
								<div class="row">
								<center><p>Bạn có chắc chắn muốn xóa đơn vị:<br>';
								echo'</p></center>
								<form method="POST">
									<div class="col-xs-1"></div>
									<div class="col-xs-7">
										'.$obj->unit_name.'
									</div>
									<div class="col-xs-3">
										
										<input type="hidden" name="unit_id" value="'.$obj->id.'">
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
		<?php }?>


		<!-- Hien thi chi tiet tung don vi mot -->
		<?php if(isset($_GET['id'])){ 
			$id = $_GET['id'];
			//lay thong tin cua don vi
			$sql1 = $mysqli->query("SELECT * FROM `unit` WHERE `id` = '$id'");
			$obj1 = $sql1->fetch_object();
			//lay thong tin user nguoi phu trach don vi $id
			$sql2 = $mysqli->query("SELECT * FROM `account` WHERE `unit_id` = '$id' AND `status` = '2'");
			//lay thong tin user thuoc don vi $id
			$sql3 = $mysqli->query("SELECT * FROM `account` WHERE `unit_id` = '$id' AND `status` = '1'");
		?>
		<div class="row">
			<div class="col-md-4">
				<h4 class="small-heading more-margin-bottom">THÔNG TIN ĐƠN VỊ</h4>
				<!-- BEGIN USER CARD -->
				<div class="the-box no-border full">
					<div class="right-action">
						<button class="btn btn-success btn-square btn-xs"><i class="fa fa-envelope"></i></button>
					</div><!-- /.right-action -->
					<img src="assets/img/photo/wide/img-1.jpg" class="img-responsive" alt="Image">
					<div class="the-box no-border bo-margin text-center user-info">
						<img src="assets/img/avatar/avatar-11.jpg" class="social-avatar img-circle absolute has-white-shadow" alt="Avatar">
						<h4><?php echo $obj1->unit_name;?></h4>
						<p class="bordered text-muted"><?php echo $obj1->unit_des;?></p>
						<p class="social-icon">
							<a href="#fakelink"><i class="fa fa-facebook icon-xs icon-circle icon-facebook"></i></a>
							<a href="#fakelink"><i class="fa fa-twitter icon-xs icon-circle icon-twitter"></i></a>
							<a href="#fakelink"><i class="fa fa-dribbble icon-xs icon-circle icon-dribbble"></i></a>
							<a href="#fakelink"><i class="fa fa-google-plus icon-xs icon-circle icon-google-plus"></i></a>
						</p>
					</div><!-- /.the-box .no-border .no-margin -->
				</div><!-- /.the-box .no-border .full -->
				<!-- END USER CARD -->
				<!-- Hien thi thong tin nhung nguoi phu trach don vi -->
				<?php while($obj2 = $sql2->fetch_object()){
				echo '
				<div class="the-box bg-danger no-border card-info text-center">
					<h4 class="bolded">'.$obj2->fullname.'</h4>
					<img src="assets/img/avatar/'.$obj2->avatar.'" class="social-avatar has-margin has-dark-shadow img-circle" alt="Avatar">
					
					<div class="row">
						<div class="col-xs-6">
							<button class="btn btn-danger btn-block"><i class="fa fa-user"></i> Unfriend</button>
						</div><!-- /.col-xs-6 -->
						<div class="col-xs-6">
							<a href="mailto:'.$obj2->email.'"><button class="btn btn-danger btn-block"><i class="fa fa-envelope"></i> Mail</button></a>
						</div><!-- /.col-xs-6 -->
					</div><!-- /.row -->
				</div>';
				} ?>
				<!-- /.the-box .bg-danger .no-border -->
				<!-- END Hien thi thong tin nhung nguoi phu trach don vi  -->
			</div><!-- /.col-md-4 -->
			<div class="col-md-8">
				<h4 class="small-heading more-margin-bottom">TẤT CẢ THÀNH VIÊN</h4>
				<div class="row">
				<?php while($obj3 = $sql3->fetch_object()){
					echo '<div class="col-sm-6">
						<!-- Hien thi thong tin thanh vien trong don vi -->
						<div class="the-box no-border">
							<div class="media user-card-sm">
							  <a class="pull-left" href="#fakelink">
								<img class="media-object img-circle" src="assets/img/avatar/'.$obj3->avatar.'" alt="'.$obj3->fullname.'">
							  </a>
							  <div class="media-body">
								<h4 class="media-heading">'.$obj3->fullname.'</h4>
								<p class="text-success"><a href="mailto:'.$obj3->email.'">'.$obj3->email.'</a></p>
							  </div>
							  <div class="right-button">
								<a href="mailto:'.$obj3->email.'"><button class="btn btn-success"><i class="fa fa-envelope"></i></button></a>
							  </div><!-- /.right-button -->
							</div>
						</div><!-- /.the-box .no-border -->
					</div>';
				} ?>
					<!-- /.col-sm-6 -->
				</div><!-- /.row -->
			</div><!-- /.col-md-8 -->
		</div><!-- /.row -->
		<?php } ?>
	</div>


					


<?php

include('layout/footer.php');
		}
	}
}
?>
