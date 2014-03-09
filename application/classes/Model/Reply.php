<?php

/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 8:48 PM
 */

class Model_Reply extends Model_Base
{
    static $table = 'reply';
    static $primary_key = 'rid';

    static $cols = array(
        'rid',
        'author_id',
        'time',
        'content',
        'topic_id',
        'status',
        'ip',
    );

    public $rid;
    public $author_id;
    public $time;
    public $content;
    public $topic_id;
    public $status;
    public $ip;

    protected function initial_data()
    {
        $this->time = e::format_time();
        $this->status = 0;
        $this->ip = Request::$client_ip;
    }

    public function validate()
    {}
}