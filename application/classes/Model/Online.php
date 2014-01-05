<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 8:52 PM
 */

class Model_Online extends Model_Save
{
    static $table = 'online';
    static $primary_key = 'hash';

    static $cols = array(
        'hash',
        'ip',
        'ua',
        'refer',
        'lastmove',
        'firsttime',
        'uri',
    );

    public $hash;
    public $ip;
    public $ua;
    public $refer;
    public $lastmove;
    public $firsttime;
    public $uri;


    protected function initial_data()
    {}

    public function validate()
    {}
}