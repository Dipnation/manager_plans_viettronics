<?php
	//tra ve thu trong tuan
	function get_date($date){
		if ($date == "Sun") {
			$result = "Chủ nhật";
		};
		if ($date == "Mon") {
			$result = "Thứ 2";
		};
		if ($date == "Tue") {
			$result = "Thứ 3";
		};

		if ($date == "Wed") {
			$result = "Thứ 4";
		};
		if ($date == "Thur") {
			$result = "Thứ 5";
		};
		if ($date == "Fri") {
			$result = "Thứ 6";
		};
		if ($date == "Sat") {
			$result = "Thứ 7";
		};
		return $result;
	}

	//lay ra ngay thu 2 dau tuan tu ngay hien tai
	function startWeek(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = date('Y/m/d', time());
		// parse about any English textual datetime description into a Unix timestamp
		$ts = strtotime($date);
		// find the year (ISO-8601 year number) and the current week
		$year = date('o', $ts);
		$week = date('W', $ts);
		// print week for the current date
		$i=1;
	    $ts = strtotime($year.'W'.$week.$i);
	    $result =  date("Y/m/d H:i:s", $ts);
	    return $result;
	}
?>