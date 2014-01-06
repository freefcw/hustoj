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
    public $status = 0;//  0, 2，啥意思
    public $top_level = 0; // 是否置顶？0,1
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

    /**
     * delete topic and replies
     *
     * @return int|void
     */
    public function destroy()
    {
        $condition = array(
            'topic_id' => $this->tid,
        );
        Model_Reply::delete($condition);
        parent::destroy();
    }

    protected function initial_data()
    {
    }

    public function validate()
    {}
}