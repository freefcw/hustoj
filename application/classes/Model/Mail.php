<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 2:17 PM
 */

class Model_Mail extends Model_Base
{
    static $cols = array(
        'mail_id',
        'to_user',
        'from_user',
        'title',
        'content',
        'new_mail',
        'reply',
        'in_date',
        'defunct',
    );

    static $primary_key = 'mail_id';
    static $table = 'mail';

    public $mail_id;
    public $to_user;
    public $from_user;
    public $title;
    public $content;
    public $new_mail;
    public $reply;
    public $in_date;
    public $defunct;

    protected function initial_data()
    {}

    public function validate()
    {}
}