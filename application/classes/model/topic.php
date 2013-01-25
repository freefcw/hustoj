<?php
/**
 * User: freefcw
 * Date: 13-1-22
 * Time: 上午12:36
 */

class Model_Topic extends Model_Mongo
{

    var $collection;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->collection = $this->db->selectCollection('topic');
    }

    /**
     * @return int
     */
    public function get_total()
    {
        return $this->collection->count();
    }

    /**
     * topics for the page at index
     *
     * @param int $index
     * @param int $limit
     *
     * @return array
     */
    public function get_page($index = 0, $limit = 20)
    {
        $condition = array();
        $result = $this->collection->find($condition)->sort(array('topic_id' => -1))->limit($limit)->skip(
            $index * $limit
        );

        return iterator_to_array($result);
    }

    /**
     * @param $topic_id
     *
     * @return array|null
     */
    public function get_topic_by_id($topic_id)
    {
        $condition = array('topic_id' => $topic_id);
        return $this->collection->findOne($condition);
    }

    /**
     * @param $topic_id
     *
     * @return array
     */
    public function get_relies_for_topic($topic_id)
    {
        $condition = array('topic_id' => $topic_id);

        $reply_c = $this->db->selectCollection('reply');

        $replies = $reply_c->find($condition);
        return iterator_to_array($replies);
    }

    /**
     * @param $topic_id
     * @param $data
     */
    public function new_reply($topic_id, $data)
    {
        $condition = array('topic_id' => $topic_id);

    }

    /**
     * @param $topic_id
     * @param $data
     */
    public function edit($topic_id, $data)
    {

    }

    /**
     * @return mixed
     */
    protected function get_new_topic_id()
    {
        return $this->get_new_id('topic_id');
    }
}