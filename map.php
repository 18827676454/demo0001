<?php
	/**
	 * 腾讯地图坐标转换为百度地图坐标
	 */
	function convertQtB ($lat, $lng)
	{
		if (empty($lat) && empty($lng)) {
			return false;
		}

		$x_pi  = 3.14159265358979324 * 3000.0 / 180.0;
		$x     = $lng;
		$y     = $lat;
		$z     = sqrt($x * $x + $y * $y) + 0.00002 * sin($y * $x_pi);
		$theta = atan2($y, $x) + 0.000003 * cos($x * $x_pi);
		$lng   = $z * cos($theta) + 0.0065;
		$lat   = $z * sin($theta) + 0.006;

		return ['lat' => $lat, 'lng' => $lng];
	}
	
	/**百度坐标系转腾讯坐标系*/
	function convertBtQ ($lat, $lng)
	{
		if (empty($lat) && empty($lng)) {
			return false;
		}

		$x_pi  = 3.14159265358979324 * 3000.0 / 180.0;
		$x     = $lng - 0.0065;
		$y     = $lat - 0.006;
		$z     = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
		$theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
		$lng   = $z * cos($theta);
		$lat   = $z * sin($theta);

		return ['lat' => $lat, 'lng' => $lng];
	}
	
	//获取某月最后一天
	function getthemonth ($date)
	{
		$firstday = date('Y-m-01', $date);
		$lastday  = date('Y-m-d', strtotime("$firstday +1 month -1 day"));

		return $lastday;
	}
	
	
	
	
	
	
	
	
	
	//获取某周第一天
	function get_W_firstday ($date)
	{
		$timestamp = $date;
		$sdate     = date('Y-m-d', $timestamp - (date('N', $timestamp) - 1) * 86400);
//特尔他了我
		return $sdate;
	}