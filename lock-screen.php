<?php
	session_start();
	unset($_SESSION['lock']);
	$errors= array();
	if(!isset($_POST['lock'])){

?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>
		<title>Trang thái chờ | Cổng thông tin kế hoạch Viettronics </title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
	</head>
 
	<body class="tooltips">
	

		<div class="login-header dark text-center">
			<img src="assets/img/logo-login.png" class="logo" alt="Logo">
		</div>
		<div class="login-wrapper">
			<?php	//Đưa thông báo gặp lỗi nào
				if(count($errors) > 0){
					foreach($errors as $errors){ ?>
						<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
						  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  	<strong>Warning!</strong> <?php echo $errors ?></a>.
						</div>
			<?php	}
					unset($errors);
				}
			?>
			<form role="form" action="inc/lock-screen.php">
				<div class="form-group text-center">
					<?php echo '<img src="assets/img/avatar/'.$_SESSION['avatar'].'" class="avatar img-circle" alt="Avatar">'; ?>
				</div>
				<div class="form-group">
					<h4 class="text-center" style="color:#8CC152 "><strong><?php echo $_SESSION['fullname'] ;?></strong></h4>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="password" class="form-control no-border input-lg rounded" placeholder="Enter password" autofocus>
				  <input type="hidden" name="username" value="<?php echo $_SESSION['account'];?>"
				  <span class="fa fa-unlock form-control-feedback"></span>
				</div>
				<div class="form-group">
					<button type="submit"  name="lock_submit" class="btn btn-success btn-lg btn-perspective btn-block">LOGIN</button>
				</div>
			</form>
			<p class="text-center"><strong><a href="logout.html">Logout</a></strong></p>
		</div><!-- /.login-wrapper -->

		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
		  
		<!-- JQUERY BACKSTRETCH JS -->
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
		<script>
			$.backstretch("assets/img/photo/large/img-14.jpg", {speed: 500});
		</script>
		
		
	</body>
</html>
<?php } ?>