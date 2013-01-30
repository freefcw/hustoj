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
        $result = $this->collection->find($condition)
            ->sort(array('topic_id' => -1))
            ->limit($limit)
            ->skip($index * $limit);

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
     * @param $data
     */
    public function add_topic($data)
    {
        $data['time'] = new MongoDate(time());

        $this->collection->save($data);
    }

    /**
     * @param $data
     */
    public function add_reply($data)
    {
        $data['time'] = new MongoDate(time());
        $this->incr_replies_for_topic($data['topic_id'], $$data['time']);

        $collection = $this->db->selectCollection('reply');
        $collection->save($data);
    }

    /**
     * @param $topic_id
     * @param $time
     *
     * @return array
     */
    protected function incr_replies_for_topic($topic_id, $time)
    {
        $this->collection->update(
            array('topic_id' => $topic_id),
            array('$inc' => array('reply_count' => 1),
                  '$set' => array('last_reply' => $time))
        );
    }

    /**
     * @return mixed
     */
    protected function get_new_topic_id()
    {
        return $this->get_new_id('topic_id');
    }

}