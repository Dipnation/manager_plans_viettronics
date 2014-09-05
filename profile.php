<?php
	include('../layout/header.php');

	if(empty($_SESSION['account'])){
		 	header('Location: login.php');
	} else{
		if(!isset($_SESSION['lock'])){
			header('Location: lock-screen.php');
		} else{

		
?>
<body class="tooltips">
<?php 
	
include('../layout/narbar.php');
include('../layout/sidebar.php');

?>
<title>Blank | Cổng thông tin kế hoạch Viettronics </title>
<!-- BEGIN PAGE CONTENT --> 
	<div class="page-content">

		<div class="container-fluid">
		<!-- Begin page heading -->
			<h1 class="page-heading">Blank page <small>Sub heading here</small></h1>
			<!-- End page heading -->
				
			<!-- Begin breadcrumb -->
			<ol class="breadcrumb default square rsaquo sm">
				<li><a href="index.html"><i class="fa fa-home"></i></a></li>
				<li><a href="#fakelink">Example pages</a></li>
				<li class="active">Blank</li>
			</ol>
		<!-- End breadcrumb -->
			<?php echo $_SESSION['unit_id'];?>		
			<p>Begin your content here</p>
			<?php echo $_SESSION['account_id'];?>
					
				
		</div><!-- /.container-fluid -->
				
				
<?php

include('layout/footer.php');
	}
}
?>
