<?php
/**
 * User: freefcw
 * Date: 13-1-22
 * Time: 上午12:36
 */

class Model_Topic extends Model_Base
{
    static $table = 'topic';
    static $primary_key = 'tid';

    static $cols = array(
        'tid',
        'title',
        'status',
        'top_level',
        'cid',
        'pid',
        'author_id',
    );

    public $tid;
    public $title;
    public $status;
    public $top_level;
    public $cid;
    public $pid;
    public $author_id;


    public function replies()
    {
        $filter = array(
            'topic_id' => $this->tid,
        );
        return Model_Reply::find($filter);
    }

    /**
     * @param     $filter
     * @param     $page
     * @param int $per_page
     *
     * @return Model_Topic[]
     */
    public static function page($filter, $page, $per_page = 50)
    {
        $order_by  = array(
            'tid' => self::ORDER_DESC
        );
        return self::find($filter, $page, $per_page, $order_by);
    }

    protected function initial_data()
    {
    }

    public function validate()
    {}
}