<?php defined('SYSPATH') or die('No direct script access.');

class OJ {

	/**
	 * @var  array  preferred order of attributes
	 */
	public static $status = array(
		"4"=>"Accepted",
		"5"=>"Presentation Error",
		"6"=>"Wrong Answer",
		"7"=>"Time Limit Exceed",
		"8"=>"Memory Limit Exceed",
		"9"=>"Output Limit Exceed",
		"10"=>"Runtime Error",
		"11"=>"Compile Error",
		"0"=>"Pending",
		"1"=>"Pending Rejudging",
		"2"=>"Compiling",
		"3"=>"Running &amp; Judging"
	);

    public static $result = array(
        "4"=>"AC",
        "5"=>"PE",
        "6"=>"WA",
        "7"=>"TLE",
        "8"=>"MLE",
        "9"=>"OLE",
        "10"=>"RE",
        "11"=>"CE",
    );
	
	public static $language = array(
		 '0'=>'C',
		 '1'=>'C++',
		 '2'=>'Pascal',
		 '3'=>'Java'
	);
	
	public static $private = array(
		'0' => 'Public',
		'1' => 'Private'
	);

	public static function jresult($value)
	{
		return OJ::$status[$value];
	}
	
	public static function lang($value)
	{
		if ($value > 3) return 'Others';
		return OJ::$language[$value];
	}
	
	public static function is_private($value)
	{
		return OJ::$private[$value];
	}

    public static function contest_pid($pid)
    {
        return chr(64 + $pid);
    }

    public static function contest_time($time)
    {
        $sec = $time % 60;
        $time = $time / 60;
        $minute = $time % 60;
        $hour = $time / 60;
        return sprintf("%02d:%02d:%02d", $hour, $minute, $sec);
    }

    /**
     * @static
     * @param $mtime
     * @return string
     *
     * make mongoDate human read
     */
    public static function mtime($mtime)
    {
        return date('Y-m-d h:i:s', $mtime->sec);
    }
}
