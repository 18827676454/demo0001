<?php
	/**
	 * ��Ѷ��ͼ����ת��Ϊ�ٶȵ�ͼ����
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
	
	/**�ٶ�����ϵת��Ѷ����ϵ*/
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
	
	//��ȡĳ�����һ��
	function getthemonth ($date)
	{
		$firstday = date('Y-m-01', $date);
		$lastday  = date('Y-m-d', strtotime("$firstday +1 month -1 day"));

		return $lastday;
	}
	
	
	//��ȡĳ�ܵ�һ��
	function get_W_firstday ($date)
	{
		$timestamp = $date;
		$sdate     = date('Y-m-d', $timestamp - (date('N', $timestamp) - 1) * 86400);
//�ض�������
		return $sdate;
	}