<?php
	include('layout/header.php');
	$title = "Chỉnh sửa đơn vị";
	$errors=array();
	$msg   =array();
	if(isset($_GET['unit'])){
		//xu ly del don vi
		if($_SESSION['status'] == 3 && isset($_POST['update_unit'])){

			$unit_id = $_GET['unit'];
			$unit_name        = $mysqli->real_escape_string($_POST['unit_name']);
			$unit_des         = $mysqli->real_escape_string($_POST['unit_des']);

			if(strlen($_POST['unit_name']) < 6)
				$errors[] = 'Tên đơn vị quá ngắn!.';
			if(count($errors) == 0){
				$sql_check = $mysqli->query("SELECT * FROM `unit` WHERE unit_name = '$unit_name' AND `id` <> '$unit_id'");
				$check_unit     = $sql_check->fetch_row();
				if($check_unit != 0) {
					$errors[] = 'Đơn vị '.$unit_name.' đã có sẵn!';
				} else{
					$sql = $mysqli->query("UPDATE `unit` SET `unit_name`='$unit_name', `unit_des`='$unit_des' WHERE `id` = '$unit_id'");
					if (!$sql) {
   						printf("Errormessage: %s\n", $mysqli->error);
   					}
					$msg[]="Đã cập nhật thành công đơn vị!";
				}
			
			}
		}
	}
	//ket thuc xu ly del don vi

	if(empty($_SESSION['account'])){
		 	header('Location: login.php');
	} else{
		if(!isset($_SESSION['lock'])){
			header('Location: lock-screen.php');
		} else{
			if($_SESSION['status'] ==3 && isset($_GET['unit'])){
				

		
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
<!-- End breadcrumb -->
		<?php if(isset($_GET['unit'])){
			$unit_id = $_GET['unit'];
			$sql = $mysqli->query("SELECT * FROM `unit` WHERE `id` = '$unit_id'");
			$obj = $sql->fetch_object();
		 ?>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="the-box">
				<h4 class="small-title">CHỈNH SỬA ĐƠN VỊ </h4>
				<form role="form" method="POST">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group has-feedback left-feedback no-label">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-briefcase"></i></span>
									<input type="text" name="unit_name" class="form-control" value="<?php echo $obj->unit_name;?>" required>
								</div>
							  
							</div>
							<div class="form-group has-feedback left-feedback no-label">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa- fa-info-circle"></i> </span>
									<textarea name="unit_des" class="form-control"  rows="4" required><?php echo $obj->unit_des;?></textarea>
								</div>
							  
							</div>
							
						</div><!-- /.col-sm-6 -->
					</div><!-- /.row -->
					<button type="submit" name="update_unit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> Cập nhật thông tin</button>
				</form>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<?php } ?>
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

	</div>


					


<?php

include('layout/footer.php');
		}
	}
}
?>
