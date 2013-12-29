<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 8:50 PM
 */

class Model_Privilege extends Model_Base
{
    static $table = 'privilege';
    static $primary_key = 'user_id';

    static $cols = array(
        'user_id',
        'rightstr',
        'defunct',
    );

    public $user_id;
    public $righstr;
    public $defunct;

    protected function initial_data()
    {}

    public function validate()
    {}
}