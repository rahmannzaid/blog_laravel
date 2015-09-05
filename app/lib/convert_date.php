<?php
Class Convert_date{
    static function indonesia($tanggal){
        $tanggal = date('D, d M Y', strtotime($tanggal));
		$format = array('Sun' => 'Minggu','Mon' => 'Senin','Tue' => 'Selasa','Wed' => 'Rabu','Thu' => 'Kamis','Fri' => 'Jumat','Sat'=> 'Sabtu',
						'Jan' => 'Januari','Feb' => 'Februari','Mar' => 'Maret','Apr' => 'April','May' => 'Mei',
						'Jun' => 'Juni','Jul' => 'Juli','Aug' => 'Agustus','Sep' => 'September','Oct' => 'Oktober','Nov' => 'November','Dec' => 'Desember');
		return strtr($tanggal, $format);
	}
    
    static function english($tanggal){
        //$tanggal = date('D, d M Y', strtotime($tanggal));
		$format = array('Sun' => 'Sunday','Mon' => 'Monday','Tue' => 'Tuesday','Wed' => 'Wednesday','Thu' => 'Thursday','Fri' => 'Friday','Sat'=> 'Saturday',
						'Jan' => 'January','Feb' => 'February','Mar' => 'March','Apr' => 'April','May' => 'May',
						'Jun' => 'June','Jul' => 'July','Aug' => 'August','Sep' => 'September','Oct' => 'October','Nov' => 'November','Dec' => 'December');
		return strtr($tanggal, $format);
	}
	
	
}

?>