<?php defined('SYSPATH') or die('No direct script access.');

class OJ {

	/**
	 * @var  array  result code to human language readable long
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

    /**
     * @var array result code to human language short
     */
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

    /**
     * @var array language code to human language
     */
	public static $language = array(
		 '0'=>'C',
		 '1'=>'C++',
		 '2'=>'Pascal',
		 '3'=>'Java'
	);

    /**
     * @var array private value to human language
     */
	public static $private = array(
		'0' => 'Public',
		'1' => 'Private'
	);

    /**
     * @static
     * @param $value
     * @return string
     *
     * translate result code to human readable
     */
	public static function jresult($value)
	{
		return OJ::$status[$value];
	}

	/**
     * @static
     * @param $value
     * @return string
     *
     * translate language code to human readable
     */
	public static function lang($value)
	{
		if ($value > 3) return 'Others';
		return OJ::$language[$value];
	}
	/**
     * @static
     * @param $value
     * @return mixed
     *
     * translate priavte code to human readable
     */
	public static function is_private($value)
	{
		return OJ::$private[$value];
	}

    /**
     * @static
     * @param $pid
     * @return string
     *
     * translate contest pid to A, B....
     */
    public static function contest_pid($pid)
    {
        return chr(64 + $pid);
    }

    /**
     * @static
     * @param $time
     * @return string
     *
     * make contest time normalize
     */
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
     * make mongoDate human readable
     */
    public static function mtime($mtime)
    {
        return date('Y-m-d h:i:s', $mtime->sec);
    }
}
