<?php

	include('layout/header.php');
	$title = "Thông tin người dùng";
	//XU ly chinh sua thong tin nguoi dung
	$errors=array();
	$msg   =array();
	if(isset($_GET['user'])){
		
		$id = $_GET['user'];
		if(isset($_POST['submit_update_user'])){
			$email        = $mysqli->real_escape_string($_POST['email']);
			$fullname     = $mysqli->real_escape_string($_POST['fullname']);
	        $unit  	      = $mysqli->real_escape_string($_POST['unit']);
	        $status  	  = $mysqli->real_escape_string($_POST['status']);
	        //checking dữ liệu nhập vào ở form

		    if(count($errors) == 0){
		    	//kiem tra email da duoc su dung chua
		    	$check_e        = $mysqli->query("SELECT * FROM `account` WHERE `email` = '$email' and `id` <> '$id'  LIMIT 1");
				$check_email    = $check_e->fetch_row();
				if($check_email != 0){
					$errors = 'Email '.$email.' đã được sử dụng';
				}else{
					if(!empty($_POST['pass'])){
						if(strlen($_POST['pass']) < 6)
							$errors[] = 'Mật khẩu có tối thiểu 6 ký tự.';

						if((!empty($_POST['pass']) && !preg_match('#^[a-z0-9]+$#i', $_POST['pass'])))
							$errors[] = 'Mật khẩu chỉ chứa ký tự: aA-zZ, 0-9.';	
						
						if(count($errors) == 0){
							//cap nhat bang account
							$mysqli->query("UPDATE `account` SET `email` = '$email',`pass`='$pass' `fullname` = '$fullname', `unit_id`='$unit',`status`='$status' WHERE `id` = '$id'");
							$msg[] = 'Cập nhật thành công!';
						}

					}elseif(empty($_POST['pass'])){
						//cap nhat bang account
						$mysqli->query("UPDATE `account` SET `email` = '$email', `fullname` = '$fullname', `unit_id`='$unit',`status`='$status' WHERE `id` = '$id' ");
						$msg[] = 'Cập nhật thành công!';
					}
				}
			}
		}
	}	

	// Doi avatar
	if(isset($_GET['avatar']) && $_GET['avatar'] == $_SESSION['account_id']){
		$title = "Thay đổi ảnh đại diện";
		$id = $_GET['avatar'];
		//xu ly upload file
    	if(!empty($_FILES['avatar'])){
			$file_ext=strtolower(end(explode('.',$_FILES['avatar']['name'])));
			$extensions = array("jpeg","jpg","png"); // dinh dang duoc phep upload
			$max_file_size = 10240000; //5MB
			$path = "assets/img/avatar/"; // Thu muc lưu file
			$file_name = $_FILES['avatar']['name'];
			$exten = substr($file_name, -4); //lay phan mo rong cua file
			$name = 'avatar-'.$id.$exten;

			if ($_FILES['avatar']['error'] == 0) {	           
				if ($_FILES['avatar']['size'] > $max_file_size) {
					$errors[] = 'File quá lớn!.';
					//continue; // Bỏ qua nếu file neu kích thước > kich thuoc tối đa cho phep
				}
				else if(in_array($file_ext,$extensions )=== false){
					$errors[] = 'File không đúng định dạng!.';
				}
				else{ // Neu khong tim thay loi thi upload file
					//upload file vao thu muc
					move_uploaded_file($_FILES["avatar"]["tmp_name"], $path.$name);
					//cap nhat bang account
					$mysqli->query("UPDATE `account` SET `avatar`='$name' WHERE `id` = '$id'");
					$msg[] = 'Cập nhật thành công!';
					
			    }
			}
		}
	}

	// Doi avatar

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

			<!-- hien thi form chinh sua nguoi dung neu co tham so truyen get user -->
			<?php if(isset($_GET['user'])){
				$id = $_GET['user'];
				$sql = $mysqli->query("SELECT * FROM `account_info` WHERE `id` = '$id' ");
				$obj = $sql->fetch_object();
			 ?>
			<div class="row">

				<div class="col-sm-6">
					
					<div class="the-box">
						<h4 class="small-title">CẬP NHẬT THÔNG TIN NGƯỜI DÙNG</h4>
						<form role="form" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-user"></i></span>
										<input type="email" name="email" class="form-control" value="<?php echo $obj->email;?>" required>
									</div>
								  
								</div>
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-key"></i></span>
										<input type="password" name="pass" class="form-control" placeholder="Mật khẩu">
									</div>
								  
								</div>
								
								
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-male"></i></span>
										<input type="text" name="fullname"  class="form-control" value="<?php echo $obj->fullname;?>" required>
									</div>
								  
								</div>
								
								<div class="form-group has-feedback left-feedback no-label">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-tag"></i></span>
										<select data-placeholder="Chọn đơn vị..." class="form-control" name="unit" tabindex="2" required>
											<option value="<?php echo $obj->unit_id;?>" ><?php echo $obj->unit_name;?></option>
											<?php $sql_unit = $mysqli->query("SELECT * FROM `unit` WHERE `id` <> '$obj->unit_id' ");
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
											<option value="<?php echo $obj->status;?>"><?php if($obj->status==1){ echo "Người dùng thường";} elseif ($obj->status==2){echo "Người quản lý";} elseif ($obj->status==3){echo "Lãnh đạo";}?></option>
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

				<div class="col-sm-6">
					<?php	//Đưa thông báo gặp lỗi nào
						if(is_array($errors) > 0){
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
			<?php }?>
			<!-- Ket thuc form chinh sua -->

						<!-- hien thi form chinh sua nguoi dung neu co tham so truyen get user -->
			<?php if(isset($_GET['avatar']) && $_GET['avatar'] == $_SESSION['account_id']){
				$id = $_GET['avatar'];
				$sql = $mysqli->query("SELECT * FROM `account_info` WHERE `id` = '$id' ");
				$obj = $sql->fetch_object();
				
			 ?>
			<div class="row">
				<div class="col-sm-3"></div>	
				<div class="col-sm-6">
					
					<div class="the-box">
						<h4 class="small-title">CẬP NHẬT ẢNH ĐẠI DIỆN</h4>
						<form role="form" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">	
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
							</div>	
							
						</div><!-- /.row -->
							<button type="submit" name="submit_update_user" class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> Cập nhật thông tin</button>
						</form>
					</div>
					
				</div>
				<div class="col-sm-3"></div>
			</div>

			<div class="row">
				<div class="col-sm-3"></div>	
				<div class="col-sm-6">
					<?php	//Đưa thông báo gặp lỗi nào
						if(is_array($errors) > 0){
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
			<?php }?>
			<!-- Ket thuc form chinh sua -->

		</div><!-- /.container-fluid -->		
				
<br><br><br><br><br>
<?php

include('layout/footer.php');
	}
}
?>
