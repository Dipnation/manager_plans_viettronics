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
		<div class="the-box full no-border">
			<div class="table-responsive">
				<table id="user2" class="table table-th-block table-primary">
					<thead>
						<tr>
							<th style="width: 30px;">No</th>
							<th>Họ tên</th>
							<th>Email</th>
							<th>Đơn vị</th>
							<th>Loại</th>
							<th>Chức năng</th>
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
							echo'<td><div class="btn-group">
								  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
										Tùy chọn <span class="caret"></span>
								  	</button>
								  	<ul class="dropdown-menu primary inline-popups" role="menu">
								  		<li><a href="#">Chỉnh sửa</a></li>
										<li><a href="#text-popup-'.$obj2->id.'" data-effect="mfp-zoom-in">Xóa</a></li>
								  	</ul>
								</div></td>';
							$stt = $stt +1;
							echo '
							<div id="text-popup-'.$obj2->id.'" class="danger-popup mfp-with-anim mfp-hide">
								<div class="row">
								<center><p>Bạn có chắc chắn muốn xóa người dùng:</p></center>
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

	<div class="the-box">
		<h4 class="small-title">MAGNIFIC POPUP NON-IMAGE</h4>
		<ul class="inline-popups">
			<li><a href="#text-popup" data-effect="mfp-zoom-in">Text popup</a></li>
			<li><a href="#text-popup-html" data-effect="mfp-zoom-in">Form popup</a></li>
			<li><a href="#youtube-popup" data-effect="mfp-zoom-in">Youtube popup</a></li>
			<li><a href="#vimeo-popup" data-effect="mfp-zoom-in">Vimeo popup</a></li>
		</ul>
		 
		<!-- Text popup -->
		<div id="text-popup" class="white-popup mfp-with-anim mfp-hide">
			<p>
			You may put any HTML here. This is dummy copy. It is not meant to be read. 
			It has been placed here solely to demonstrate the look and feel of finished, 
			typeset text. Only for show. He who searches for meaning here will be sorely disappointed.
			</p>
		</div>
		 
		<!-- Form popup -->
		<div id="text-popup-html" class="white-popup mfp-with-anim mfp-hide">
			  <div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="form-group">
				<label for="exampleInputFile">File input</label>
				<input type="file" id="exampleInputFile">
				<p class="help-block">Example block-level help text here.</p>
			  </div>
			  <div class="checkbox">
				<label>
				  <input type="checkbox"> Check me out
				</label>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
		</div>
		 
		<!-- Youtube popup -->
		<div id="youtube-popup" class="video-popup mfp-with-anim mfp-hide">
			<div class="video-wrapper">
				<iframe src="http://www.youtube.com/embed/lz_AocT5nvM" allowfullscreen></iframe>
			</div><!-- /.video-wrapper -->
		</div>
		 
		<!-- Vimeop popup -->
		<div id="vimeo-popup" class="video-popup mfp-with-anim mfp-hide">
			<div class="video-wrapper">
				<iframe src="http://player.vimeo.com/video/90049558?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="550" height="232" allowfullscreen></iframe>
			</div><!-- /.video-wrapper -->
		</div>
	</div><!-- /.the-box -->
					
					
<script>
    $(document).ready(function(){
        $('#user2').dataTable();
    });
	 $(document).ready(function(){
        $('#table-product').dataTable();
    });
	$(document).ready(function(){
        $('#table-payment').dataTable();
    });
	$(document).ready(function(){
        $('#table-category').dataTable();
    });
	$(document).ready(function(){
        $('#table-sell').dataTable();
    });
</script>
<?php

include('layout/footer.php');
	}
}
?>
