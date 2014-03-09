<?php

/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 11:59 AM
 */

class Model_Userlog extends Model_Save
{
    static $cols = array(
        'user_id',
        'password',
        'ip',
        'time',
    );

    static $primary_key = 'user_id';

    static $table = 'loginlog';

    public $user_id;
    public $password;
    public $ip;
    public $time;

    protected function initial_data()
    {
        $this->time = e::format_time();
        $this->ip = Request::$client_ip;
    }

    public static function recent_log_for_user($user_id)
    {
        $filter = array(
            'user_id' => $user_id,
        );
        return self::find($filter, 1, 20);
    }

    public function validate()
    {}
}