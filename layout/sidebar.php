<?php
	$unit_id = $_SESSION['unit_id'];
	$account_id = $_SESSION['account_id'];
	//danh sach nguoi dung cung don vi dang online
	$sql_friend = $mysqli->query("SELECT * FROM `account_online` WHERE `unit_id` = '$unit_id' AND `account_id` <> '$account_id'");
	//danh sach tat ca nguoi dung dang online
	$sql_sys = $mysqli->query("SELECT * FROM `account_online`");
?>			
			
<!-- BEGIN SIDEBAR LEFT -->
<div class="sidebar-left sidebar-nicescroller">
	<ul class="sidebar-menu">
		<li><a href="index.html"><i class="fa fa-dashboard icon-sidebar"></i>Dashboard</a></li>
		<li class="static">NGƯỜI DÙNG</li>
		<li>
			<a href="#fakelink">
				<i class="fa fa-user icon-sidebar"></i>
				<i class="fa fa-angle-right chevron-icon-sidebar"></i>
				Hồ sơ cá nhân
				
			</a>
			<ul class="submenu">
				<li><a href="edit-user.php?user=<?php echo $_SESSION['account_id'];?>">Cập nhật hồ sơ<span class="label label-success span-sidebar">UPDATE</span></a></li>

			</ul>
			<?php if($_SESSION['status'] !=1){?>
			<a href="#fakelink">
				<i class="fa fa-users icon-sidebar"></i>
				<i class="fa fa-angle-right chevron-icon-sidebar"></i>
				Quản lý người dùng
				
			</a>
			<ul class="submenu">
				<li><a href="list-user.php">Danh sách User <span class="badge badge-success span-sidebar">5</span></a></li>
				<li><a href="add-user.php">Thêm mới<span class="label label-danger span-sidebar">NEW</span></a></li>
				<li><a href="edit-user.php">Chỉnh sửa hồ sơ</a></li>

			</ul>
			<?php } ?>
		</li>
		<?php if($_SESSION['status'] ==3){?>
		<li class="static">ĐƠN VỊ</li>
		<li>
			<a href="#fakelink">
				<i class="fa fa-briefcase icon-sidebar"></i>
				<i class="fa fa-angle-right chevron-icon-sidebar"></i>
				Quản lý đơn vị
				
			</a>
			<ul class="submenu">
				<li><a href="unit-list">Danh sách đơn vị <span class="badge badge-success span-sidebar">5</span></a></li>
				<li><a href="unit-new">Thêm mới<span class="label label-danger span-sidebar">NEW</span></a></li>

			</ul>

		</li>
		<?php }?>
		<?php if($_SESSION['status'] ==3){?>
		<li class="static">NHÓM CÔNG VIỆC</li>
		<li>
			<a href="#fakelink">
				<i class="fa fa-briefcase icon-sidebar"></i>
				<i class="fa fa-angle-right chevron-icon-sidebar"></i>
				Quản lý nhóm công việc
				
			</a>
			<ul class="submenu">
				<li><a href="unit-list">DS nhóm công việc <span class="badge badge-success span-sidebar">5</span></a></li>
				<li><a href="unit-new">Thêm mới<span class="label label-danger span-sidebar">NEW</span></a></li>

			</ul>

		</li>
		<?php }?>
		<li class="static">CÔNG VIỆC</li>
		<li>
			<a href="#fakelink">
				<i class="fa fa-envelope icon-sidebar"></i>
				<i class="fa fa-angle-right chevron-icon-sidebar"></i>
				Mail apps
				<span class="label label-danger span-sidebar">HOT</span>
			</a>
			<ul class="submenu">
				<li><a href="mail-inbox.html">Inbox <span class="badge badge-success span-sidebar">5</span></a></li>
				<li><a href="mail-send.html">Sent mail</a></li>
				<li><a href="mail-new.html">New mail</a></li>
				<li><a href="mail-contact.html">Mail contact</a></li>
				<li><a href="mail-read.html">Read mail</a></li>
				<li><a href="mail-reply.html">Reply mail</a></li>
			</ul>
		</li>

		<li>
			<a href="#fakelink">
				<i class="fa fa-heart icon-sidebar"></i>
				<i class="fa fa-angle-right chevron-icon-sidebar"></i>
				Example pages
			</a>
			<ul class="submenu">
				<li><a href="login.html">Login</a></li>
				<li><a href="lock-screen.html">Lock screen</a></li>
				<li><a href="forgot-password.html">Forgot password</a></li>
				<li><a href="register.html">Register</a></li>
				<li><a href="example-pricing-table.html">Pricing table</a></li>
				<li><a href="example-invoice.html">Invoice</a></li>
				<li><a href="example-faq.html">FAQ</a></li>
				<li><a href="example-search.html">Search page</a></li>
				<li><a href="404.html">404</a></li>
				<li class="active selected"><a href="blank.html">Blank page</a></li>
			</ul>
		</li>
		<!-- Hiển thị thông báo hệ thống với quản trị viên -->
		<?php if(isset($_SESSION['account']) && $_SESSION['status'] == 3){ ?>
		<li class="static">SYSTEM SETTING</li>
		<li class="text-content">
			<div class="switch">
				<div class="onoffswitch blank">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="alertme" checked>
					<label class="onoffswitch-label" for="alertme">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
			Alert me when system down
		</li>
		<li class="text-content">
			<div class="switch">
				<div class="onoffswitch blank">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="autoupdate">
					<label class="onoffswitch-label" for="autoupdate">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
			Automatic update
		</li>
		<li class="text-content">
			<div class="switch">
				<div class="onoffswitch blank">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="dailyreport">
					<label class="onoffswitch-label" for="dailyreport">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
			Daily task report
		</li>
		<li class="text-content">
			<div class="switch">
				<div class="onoffswitch blank">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="remembercomputer" checked>
					<label class="onoffswitch-label" for="remembercomputer">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
			Remember this computer
		</li>
		<?php } ?>

		<li class="nav-footer">
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
								 
			
			<br />

          	<div class="nav-footer-divider"></div>
          	<!-- START button group-->
          	<div class="btn-group text-center">
             	<a href="#text-popup" data-effect="mfp-zoom-in" data-title="Thêm người dùng" >
                	<em class="fa fa-user text-muted"><sup class="fa fa-plus"></sup>
                	</em>
             	</a>
             	<button type="button" data-toggle="tooltip" data-title="Add Job" class="btn btn-link">
                	<em class="fa  fa-pencil text-muted"><sup class="fa fa-plus"></sup>
                	</em>
             	</button>
             	<button type="button" data-toggle="tooltip" data-title="Settings" class="btn btn-link">
                	<em class="fa fa-cog text-muted"></em>
             	</button>
             	<button type="button" data-toggle="tooltip" data-title="Logout" class="btn btn-link">
                	<em class="fa fa-sign-out text-muted"></em>
             	</button>
          	</div>
          <!-- END button group-->
       	</li>

	</ul>
</div><!-- /.sidebar-left -->
<!-- END SIDEBAR LEFT -->



<!-- BEGIN SIDEBAR RIGHT HEADING -->
<div class="sidebar-right-heading">
	<ul class="nav nav-tabs square nav-justified">
	  <li class="active"><a href="#online-user-sidebar" data-toggle="tab"><i class="fa fa-comments"></i></a></li>
	  <li><a href="#notification-sidebar" data-toggle="tab"><i class="fa fa-bell"></i></a></li>
	  <li><a href="#task-sidebar" data-toggle="tab"><i class="fa fa-tasks"></i></a></li>
	  <li><a href="#setting-sidebar" data-toggle="tab"><i class="fa fa-cogs"></i></a></li>
	</ul>
</div><!-- /.sidebar-right-heading -->
<!-- END SIDEBAR RIGHT HEADING -->



<!-- BEGIN SIDEBAR RIGHT -->
<div class="sidebar-right sidebar-nicescroller">
	<div class="tab-content">
	  <div class="tab-pane fade in active" id="online-user-sidebar">
		<ul class="sidebar-menu online-user">
			<li class="static">FRIEND</li>
			<?php 
				while($obj = $sql_friend->fetch_object()){ 
					$id = $obj->account_id;
					$id_user = $mysqli->query("SELECT * FROM `account_info` WHERE `id` = $id LIMIT 1");
					$obj_name = $id_user->fetch_object();
				/*	$count_user = $id_user->fetch_row();
					if($count_user == 0){
						echo '<li><center><a href="#fakelink">Không có ai</a></center></li>';
					}*/
			?>
					<li><a href="#">
						<span class="user-status success"></span>
						<img src="assets/img/avatar/<?php echo $obj_name->avatar;?>" class="ava-sidebar img-circle" alt="Avatar">
						<?php echo $obj_name->fullname; ?>
						<span class="small-caps"><?php echo $obj_name->unit_name;?></span>
					</a></li>
			<?php
				}
			?>
			<!-- Hien thi nguoi dung truc tuyen doi voi admin -->
			<?php if($_SESSION['status'] == 3){
				echo '<li class="static">SYSTEM</li>';
				while($obj = $sql_sys->fetch_object()){ 
					$id = $obj->account_id;
					$id_user = $mysqli->query("SELECT * FROM `account_info` WHERE `id` = $id LIMIT 1");
					$obj_name = $id_user->fetch_object();
			?>
					<li><a href="#">
						<span class="user-status success"></span>
						<img src="assets/img/avatar/<?php echo $obj_name->avatar;?>" class="ava-sidebar img-circle" alt="Avatar">
						<?php echo $obj_name->fullname;?>
						<span class="small-caps"><?php echo $obj_name->unit_name;?></span>
					</a></li>
			<?php
				}
			}
			?>
		</ul>
	  </div>
	  <div class="tab-pane fade" id="notification-sidebar">
		<ul class="sidebar-menu sidebar-notification">
			<li class="static">TODAY</li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Karen Wallace" data-placement="left">
				<img src="assets/img/avatar/avatar-25.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Posted something on your profile page</span>
				<span class="small-caps">17 seconds ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Phillip Lucas" data-placement="left">
				<img src="assets/img/avatar/avatar-24.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Uploaded a photo</span>
				<span class="small-caps">2 hours ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Sandra Myers" data-placement="left">
				<img src="assets/img/avatar/avatar-23.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Commented on your post</span>
				<span class="small-caps">5 hours ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Charles Guerrero" data-placement="left">
				<img src="assets/img/avatar/avatar-22.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Send you a message</span>
				<span class="small-caps">17 hours ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Maria Simpson" data-placement="left">
				<img src="assets/img/avatar/avatar-21.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Change her avatar</span>
				<span class="small-caps">20 hours ago</span>
			</a></li>
			
			<li class="static">YESTERDAY</li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Jason Crawford" data-placement="left">
				<img src="assets/img/avatar/avatar-20.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Posted something on your profile page</span>
				<span class="small-caps">Yesterday 10:45:12</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Cynthia Mendez" data-placement="left">
				<img src="assets/img/avatar/avatar-19.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Uploaded a photo</span>
				<span class="small-caps">Yesterday 08:00:05</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Peter Ramirez" data-placement="left">
				<img src="assets/img/avatar/avatar-18.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Commented on your post</span>
				<span class="small-caps">Yesterday 07:49:08</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Jessica Gutierrez" data-placement="left">
				<img src="assets/img/avatar/avatar-17.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Send you a message</span>
				<span class="small-caps">Yesterday 07:35:19</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="Ryan Ortega" data-placement="left">
				<img src="assets/img/avatar/avatar-16.jpg" class="ava-sidebar img-circle" alt="Avatar">
				<span class="activity">Change her avatar</span>
				<span class="small-caps">Yesterday 06:00:00</span>
			</a></li>
			
			<li class="static text-center"><button class="btn btn-primary btn-sm">See all notifications</button></li>
		</ul>
	  </div>
	  <div class="tab-pane fade" id="task-sidebar">
		<ul class="sidebar-menu sidebar-task">
			<li class="static">UNCOMPLETED</li>
			<li><a href="#fakelink" data-toggle="tooltip" title="in progress" data-placement="left">
				<i class="fa fa-clock-o icon-task-sidebar progress"></i>
				Creating documentation
				<span class="small-caps">Deadline : Next week</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="uncompleted" data-placement="left">
				<i class="fa fa-exclamation-circle icon-task-sidebar uncompleted"></i>
				Eating sand
				<span class="small-caps">Deadline : 2 hours ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="uncompleted" data-placement="left">
				<i class="fa fa-exclamation-circle icon-task-sidebar uncompleted"></i>
				Sending payment
				<span class="small-caps">Deadline : 2 seconds ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="in progress" data-placement="left">
				<i class="fa fa-clock-o icon-task-sidebar progress"></i>
				Uploading new version
				<span class="small-caps">Deadline : Tomorrow</span>
			</a></li>
			
			<li class="static">COMPLETED</li>
			<li><a href="#fakelink" data-toggle="tooltip" title="completed" data-placement="left">
				<i class="fa fa-check-circle-o icon-task-sidebar completed"></i>
				Drinking coffee
				<span class="small-caps">Completed : 10 hours ago</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="completed" data-placement="left">
				<i class="fa fa-check-circle-o icon-task-sidebar completed"></i>
				Walking to nowhere
				<span class="small-caps">Completed : Yesterday</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="completed" data-placement="left">
				<i class="fa fa-check-circle-o icon-task-sidebar completed"></i>
				Sleeping under bridge
				<span class="small-caps">Completed : Feb 10 2014</span>
			</a></li>
			<li><a href="#fakelink" data-toggle="tooltip" title="completed" data-placement="left">
				<i class="fa fa-check-circle-o icon-task-sidebar completed"></i>
				Buying some cigarettes
				<span class="small-caps">Completed : Jan 15 2014</span>
			</a></li>
			
			<li class="static text-center"><button class="btn btn-success btn-sm">See all tasks</button></li>
		</ul>
	  </div><!-- /#task-sidebar -->
	  <div class="tab-pane fade" id="setting-sidebar">
		<ul class="sidebar-menu">
			<li class="static">ACCOUNT SETTING</li>
			<li class="text-content">
				<div class="switch">
					<div class="onoffswitch blank">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="onlinestatus" checked>
						<label class="onoffswitch-label" for="onlinestatus">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
				Online status
			</li>
			<li class="text-content">
				<div class="switch">
					<div class="onoffswitch blank">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="offlinecontact" checked>
						<label class="onoffswitch-label" for="offlinecontact">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
				Show offline contact
			</li>
			<li class="text-content">
				<div class="switch">
					<div class="onoffswitch blank">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="invisiblemode">
						<label class="onoffswitch-label" for="invisiblemode">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
				Invisible mode
			</li>
			<li class="text-content">
				<div class="switch">
					<div class="onoffswitch blank">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="personalstatus" checked>
						<label class="onoffswitch-label" for="personalstatus">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
				Show my personal status
			</li>
			<li class="text-content">
				<div class="switch">
					<div class="onoffswitch blank">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="deviceicon">
						<label class="onoffswitch-label" for="deviceicon">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
				Show my device icon
			</li>
			<li class="text-content">
				<div class="switch">
					<div class="onoffswitch blank">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="logmessages">
						<label class="onoffswitch-label" for="logmessages">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
				Log all message
			</li>
		</ul>
	  </div><!-- /#setting-sidebar -->
	</div><!-- /.tab-content -->
</div><!-- /.sidebar-right -->
<!-- END SIDEBAR RIGHT -->