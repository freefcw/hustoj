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
        echo e::get_url($uri);
    }

    public static function get_url($uri)
    {
        $uri = ltrim( $uri, '/');
        return Kohana::$base_url. $uri;
    }

    public static function gen_pager_url($base_url, $page)
    {
        $params = Request::$current->query();
        $params['page'] = $page;
        echo e::get_url($base_url. '/'. URL::query($params));
    }

    public static function home()
    {
        echo Kohana::$base_url;
    }

    public static function anchor($url, $title)
    {
        echo HTML::anchor(e::get_url( $url ), $title );
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
            '1 year|%d years' => 31536000,
            '1 week|%d weeks' => 604800,
            '1 day|%d days'   => 86400,
            '1 hour|%d hours' => 3600,
            '1 min|%d mins'   => 60,
            '1 sec|%d secs'   => 1
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

        return $output ? $output : "Just now";
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
}