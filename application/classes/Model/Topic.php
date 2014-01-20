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

    protected $_author = NULL;

    public function replies($page = 1, $limit = 50)
    {
        $filter = array(
            'topic_id' => $this->tid,
        );
        $orderby = array(
            'time' => 'ASC'
            # 'rid' => 'ASC' # is also ok, i think
        );
        return Model_Reply::find($filter, $page, $limit, $orderby);
    }

    /**
     * 返回帖子创建泽
     *
     * @return Model_User
     */
    public function author()
    {
        if ( is_null($this->_author) )
            $this->_author = Model_User::find_by_id($this->author_id);

        return $this->_author;
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