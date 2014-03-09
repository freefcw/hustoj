<?php
/**
 * @author: freefcw
 * Date: 3/8/14
 * Time: 12:46 AM
 */

class e
{
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

    public static function favicon()
    {
        echo e::get_url('favicon.ico');
    }

    public static function anchor($url, $title)
    {
        echo HTML::anchor(e::get_url( $url ), $title );
    }
}