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

    /**
     * @param     $username
     * @param int $page
     * @param int $limit
     *
     * @return Model_Mail
     */
    public static function find_user_inbox($username, $page = 1, $limit =  20)
    {
        $filter = array(
            'to_user' => $username,
        );

        return self::find($filter, $page, $limit);
    }

    /**
     * @param     $username
     * @param int $page
     * @param int $limit
     *
     * @return Model_Mail
     */
    public static function find_user_outbox($username, $page = 1, $limit = 20)
    {
        $filter = array(
            'from_user' => $username,
        );

        return self::find($filter, $page, $limit);
    }

    /**
     * fetch user send mail
     *
     * @param $username
     *
     * @return int
     */
    public static function count_user_outbox($username)
    {
        $filter = array(
            'from_user' => $username,
        );

        return self::count($filter);
    }

    /**
     * @param $username
     *
     * @return int
     */
    public static function count_user_inbox($username)
    {
        $filter = array(
            'to_user' => $username,
        );

        return self::count($filter);
    }

    /**
     *  is the user is the sender or the receiver
     *
     * @param Model_User $user
     *
     * @return bool
     */
    public function is_owner($user)
    {
        return $this->to_user == $user->user_id
            OR $this->from_user == $user->user_id;
    }

    protected function initial_data()
    {
        $this->new_mail = 1;
        $this->in_date = e::format_time();
        $this->reply = 0;
        $this->defunct = self::DEFUNCT_NO;
    }

    public function validate()
    {}
}