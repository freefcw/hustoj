<?php

/**
 * @author: freefcw
 * Date: 3/8/14
 * Time: 12:46 AM
 *
 */

/**
 * static helper for html
 */
class e
{

    const LOGIN_URL = '/user/login';
    const LOGOUT_URL = '/user/logout';
    const DISABLED_URL = '/user/disabled';

    const time_format = 'Y-m-d h:i:s';

    protected static $email_confuse_term
        = array(
            '@#',
            '$#',
            '$$',
            '||',
            '&&',
            'AT',
            '@@',
            '^@^',
            '*.*',
            '&.&',
            '-.-'
        );

    public static function url($uri)
    {
        echo URL::site($uri);
    }

    public static function adjust_scope($num, $max, $min = 0)
    {
        if ( $num < 0 )
            return $min;
        if ( $num > $max )
            return $max;

        return $num;
    }

    public static function gen_pager_url($base_url, $page)
    {
        $params = Request::$current->query();
        $params['page'] = $page;
        $uri = $base_url. '/'. URL::query($params);
        echo URL::site($uri);
    }

    public static function home()
    {
        echo URL::base();
    }


    /**
     * @static
     *
     * @param $value
     *
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
     *
     * @param $value
     *
     * @return string
     *
     * translate language code to human readable
     */
    public static function lang($value)
    {
        if ( $value > 3 )
        {
            return 'Others';
        }

        return OJ::$language[$value];
    }

    /**
     * translate private code to human readable
     *
     * @param $value
     *
     * @return mixed
     */
    public static function private_value($value)
    {
        return OJ::$private[$value];
    }

    /**
     * @static
     *
     * @param $pid
     *
     * @return string
     *
     * translate contest pid to A, B....
     */
    public static function contest_pid($pid)
    {
        return chr(65 + $pid);
    }

    /**
     * @static
     *
     * @param $time
     *
     * @return string
     *
     * make contest time normalize
     */
    public static function the_contest_time($time)
    {
        $sec    = $time % 60;
        $time   = $time / 60;
        $minute = $time % 60;
        $hour   = $time / 60;

        echo sprintf("%02d:%02d:%02d", $hour, $minute, $sec);
    }

    /**
     * @static
     *
     * @param     $timestamp
     * @param int $granularity
     *
     * @return string
     *
     * from http://stackoverflow.com/questions/2952361/date-time-convert-to-time-since-php
     *
     * make timestamp to timesince
     */
    public static function timesince($timestamp, $granularity = 2)
    {
        $timestamp = time() - strtotime($timestamp);
        $units     = array(
            __('1 year|%d years') => 31536000,
            __('1 week|%d weeks') => 604800,
            __('1 day|%d days')   => 86400,
            __('1 hour|%d hours') => 3600,
            __('1 min|%d mins')   => 60,
            __('1 sec|%d secs')   => 1
        );
        $output    = '';
        foreach ( $units as $key => $value )
        {
            $key = explode('|', $key);
            if ( $timestamp >= $value )
            {
                $pluralized = floor($timestamp / $value) > 1 ?
                    sprintf($key[1], floor($timestamp / $value)) :
                    $key[0];
                $output .= ($output ? ' ' : '').$pluralized;
                $timestamp %= $value;
                $granularity--;
            }
            if ( $granularity == 0 )
            {
                break;
            }
        }

        return $output ? $output : __("Just now");
    }

    /**
     * 统一格式化时间
     *
     * @param string $format
     *
     * @return bool|string
     */
    public static function format_time($format = 'Y-m-d H:i:s')
    {
        return date($format);
    }

    /**
     * 生成分页的url
     *
     * @param $page
     *
     * @return string
     */
    public static function gen_page_url($page)
    {
        $params         = Request::current()->query();
        $params['page'] = $page;

        return Request::current()->uri().URL::query($params);
    }

    /**
     * @param     $total int
     * @param int $per_page
     *
     * @return float
     */
    public static function get_total_pages($total, $per_page = 20)
    {
        return ceil($total / $per_page);
    }

    public static function get_max_pagination_page($total_pages = 1, $distance = 5)
    {
        $current_page = Request::current()->query('page');

        if ( !$current_page ) $current_page = 1;

        $start = $current_page - $distance;
        if ( $total_pages - $current_page < $distance )
        {
            $start = $total_pages - $distance * 2 + 1;
        }
        if ( $start < 1 ) $start = 1;

        $end = $start + $distance * 2 - 1;
        if ( $end > $total_pages ) $end = $total_pages;

        return array( $start, $end );
    }

    /**
     * mix the email address
     *
     * @param string $email
     *
     * @return string
     */
    public static function anti_mail_crawler($email)
    {
        if ( $email )
        {
            $term = self::$email_confuse_term[rand(0, count(self::$email_confuse_term) - 1)];

            return str_replace('@', $term, $email);
        } else
        {
            return '@.@';
        }
    }

    /**
     * get base config
     *
     * @param string $key
     * @param string $default
     *
     * @return string
     */
    protected static function get_base_config($key, $default)
    {
        return Kohana::$config->load('base')->get($key, $default);
    }

    /**
     * get website name
     *
     * @return string
     */
    public static function get_website_name()
    {
        return e::get_base_config('name', 'HUSTOJ');
    }

    /**
     * get website support team
     *
     * @return string
     */
    public static function get_website_team()
    {
        return e::get_base_config('team', 'HUST ACMICPC TEAM');
    }

    /**
     * get website description 
     *
     * @return string
     */
    public static function get_website_desc()
    {
        return e::get_base_config('desc', '');
    }

    /**
     * get website keyword
     *
     * @return string
     */
    public static function get_website_keyword()
    {
        return e::get_base_config('keyword', '');
    }

    public static function pass_status(Model_Problem $problem)
    {
        /* @var Model_User $cu */
        $cu = Auth::instance()->get_user();
        if ( $cu )
        {
            if ( $cu->is_problem_resolved($problem->problem_id))
                return 'passed';
            if ( $cu->is_problem_trying($problem->problem_id) )
                return 'trying';
        }
        return '';
    }
}
