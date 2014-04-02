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

    const MAIL_NEW  = 1;
    const MAIL_READ = 0;

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
     * mark mail as read
     *
     */
    public function mark_as_read()
    {
        if ( $this->is_unread() )
        {
            $this->new_mail = self::MAIL_READ;
            $this->save();
        }
    }

    /**
     * is mail unread
     *
     * @return bool
     */
    public function is_unread()
    {
        return (int)$this->new_mail == self::MAIL_NEW;
    }

    /**
     * judge user is the receiver
     *
     * @param Model_User|string $user
     *
     * @return bool
     */
    public function is_receiver($user)
    {
        if ( $user instanceof Model_User )
        {
            return $this->to_user == $user->user_id;
        }
        return $this->to_user == $user;
    }

    /**
     *
     * the number of unread mail for user
     *
     * @param $user_id
     *
     * @return int
     */
    public static function number_of_unread_mail_for_user($user_id)
    {
        $query = DB::select(DB::expr('count(*) as number'))->from(self::$table)
            ->where('to_user', '=', $user_id)
            ->where('new_mail', '=', self::MAIL_NEW);

        $result = $query->execute()->current();

        return $result['number'];
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
        $this->new_mail = self::MAIL_NEW;
        $this->in_date = e::format_time();
        $this->reply = 0;
        $this->defunct = self::DEFUNCT_NO;
    }

    public function validate()
    {}
}