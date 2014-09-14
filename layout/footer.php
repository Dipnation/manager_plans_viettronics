<!-- BEGIN FOOTER -->
				<footer>
					<?php

						$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

						function getOS() { 

						    global $user_agent;

						    $os_platform    =   "Unknown OS Platform";

						    $os_array       =   array(
						                            '/windows nt 6.3/i'     =>  'Windows 8.1',
						                            '/windows nt 6.2/i'     =>  'Windows 8',
						                            '/windows nt 6.1/i'     =>  'Windows 7',
						                            '/windows nt 6.0/i'     =>  'Windows Vista',
						                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
						                            '/windows nt 5.1/i'     =>  'Windows XP',
						                            '/windows xp/i'         =>  'Windows XP',
						                            '/windows nt 5.0/i'     =>  'Windows 2000',
						                            '/windows me/i'         =>  'Windows ME',
						                            '/win98/i'              =>  'Windows 98',
						                            '/win95/i'              =>  'Windows 95',
						                            '/win16/i'              =>  'Windows 3.11',
						                            '/macintosh|mac os x/i' =>  'Mac OS X',
						                            '/mac_powerpc/i'        =>  'Mac OS 9',
						                            '/linux/i'              =>  'Linux',
						                            '/ubuntu/i'             =>  'Ubuntu',
						                            '/iphone/i'             =>  'iPhone',
						                            '/ipod/i'               =>  'iPod',
						                            '/ipad/i'               =>  'iPad',
						                            '/android/i'            =>  'Android',
						                            '/blackberry/i'         =>  'BlackBerry',
						                            '/webos/i'              =>  'Mobile'
						                        );

						    foreach ($os_array as $regex => $value) { 

						        if (preg_match($regex, $user_agent)) {
						            $os_platform    =   $value;
						        }

						    }   

						    return $os_platform;

						}

						function getBrowser() {

						    global $user_agent;

						    $browser        =   "Unknown Browser";

						    $browser_array  =   array(
						                            '/msie/i'       =>  'Internet Explorer',
						                            '/firefox/i'    =>  'Firefox',
						                            '/safari/i'     =>  'Safari',
						                            '/chrome/i'     =>  'Chrome',
						                            '/opera/i'      =>  'Opera',
						                            '/netscape/i'   =>  'Netscape',
						                            '/maxthon/i'    =>  'Maxthon',
						                            '/konqueror/i'  =>  'Konqueror',
						                            '/mobile/i'     =>  'Handheld Browser'
						                        );

						    foreach ($browser_array as $regex => $value) { 

						        if (preg_match($regex, $user_agent)) {
						            $browser    =   $value;
						        }

						    }

						    return $browser;

						}


						$user_os        =   getOS();
						$user_browser   =   getBrowser();

						$device_details =   "<strong>Browser: </strong>".$user_browser." <strong>Operating System: </strong>".$user_os."";

						print_r($device_details);


					?>
					<br>
					

					&copy; 2014 <a href="#fakelink">TatDat Pham</a> 
					Design by <a href="http://isohdesign.com/" target="_blank">ids</a>. 
				</footer>
				<!-- END FOOTER -->
				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->
		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		

		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
		<script src="assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
 
		<!-- PLUGINS -->
		<script src="assets/plugins/skycons/skycons.js"></script>
		<script src="assets/plugins/prettify/prettify.js"></script>
		<script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
		<script src="assets/plugins/icheck/icheck.min.js"></script>
		<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="assets/plugins/mask/jquery.mask.min.js"></script>
		<script src="assets/plugins/validator/bootstrapValidator.min.js"></script>
		<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/js/bootstrap.datatable.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.tableTools.js"></script>
		<script src="assets/plugins/summernote/summernote.min.js"></script>
		<script src="assets/plugins/markdown/markdown.js"></script>
		<script src="assets/plugins/markdown/to-markdown.js"></script>
		<script src="assets/plugins/markdown/bootstrap-markdown.js"></script>
		<script src="assets/plugins/slider/bootstrap-slider.js"></script>
		
		<!-- EASY PIE CHART JS -->
		<script src="assets/plugins/easypie-chart/easypiechart.min.js"></script>
		<script src="assets/plugins/easypie-chart/jquery.easypiechart.min.js"></script>
		
		<!-- KNOB JS -->
		<!--[if IE]>
		<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
		<![endif]-->
		<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="assets/plugins/jquery-knob/knob.js"></script>

		

		<!-- MORRIS JS -->
		<script src="assets/plugins/morris-chart/raphael.min.js"></script>
		<script src="assets/plugins/morris-chart/morris.min.js"></script>
			
		<script src="assets/plugins/validator/example.js"></script>
		
		<!-- MAIN APPS JS -->
		<script src="assets/js/apps.js"></script>
	</body>
</html>