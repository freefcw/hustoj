<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 8:53 PM
 */

class Model_Message extends Model_Base {

    static $table = 'message';
    static $primary_key = 'message_id';

    static $cols = array(
        'message_id',
        'problem_id',
        'parent_id',
        'thread_id',
        'depth',
        'orderNum',
        'user_id',
        'title',
        'content',
        'in_date',
        'defunct',
    );

    public $message_id;
    public $problem_id;
    public $parent_id;
    public $thread_id;
    public $depth;
    public $orderNum;
    public $user_id;
    public $title;
    public $content;
    public $in_date;
    public $defunct;

    protected function initial_data()
    {

    }

    public function validate()
    {}
}
