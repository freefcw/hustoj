<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * problems handle for hust online judge
 *
 * @author freefcw
 */

class Model_Problem extends Model_Mongo {

    var $collection;

    public function __construct()
    {
        parent::__construct();
        $this->collection = $this->db->selectCollection('problem');
    }

    public function get_problem($pid)
    {
        $condition = array('problem_id' => intval($pid));
        $ret = $this->collection->findOne($condition);

        return $ret;
    }

    public function get_problem_by_id($id)
    {
        $condition = array('_id' => $id);
        $ret = $this->collection->findOne($condition);

        return $ret;

    }

    public function get_page($page_id, $per_page = 50)
    {
        $start = ($page_id - 1) * $per_page + 1000;

        $condition = array('problem_id' => array('$gte' => $start));
        $need = array('problem_id', 'title', 'accepted', 'submit');
        $cursor =$this->collection->find($condition, $this->i_need($need))
            ->sort(array('problem_id' => 1))->limit($per_page);
        //foreach($cursor as $doc) var_dump($doc);
        //var_dump(iterator_to_array($cursor));

        return iterator_to_array($cursor);
    }
    public function get_page_for_admin($page_id, $per_page = 50)
    {
        $start = ($page_id - 1) * $per_page + 1000;

        $condition = array('problem_id' => array('$gte' => $start));
        $need = array('problem_id', 'title', 'deleted', 'add_date');
        $cursor =$this->collection->find($condition, $this->i_need($need))
            ->sort(array('problem_id' => 1))->limit($per_page);
        //foreach($cursor as $doc) var_dump($doc);
        //var_dump(iterator_to_array($cursor));

        return iterator_to_array($cursor);
    }
    /**
    * return total problems
    *
    *  @author freefcw
    *  @return int
    */
    public function get_total()
    {
        $condition = array('problem_id' => array('$exists' => true));
        $ret = $this->collection->count($condition);

        return $ret;
    }

    /**
     * @param int $count
     * @return array
     *
     * get recent problem information for index page
     */
    public function get_recent($count = 5)
    {
        $condition = array();
        $need = array();

        $ret = $this->connection->find($condition, $this->i_need($need))
            ->sort(array('problem_id' => -1))
            ->limit($count);

        return iterator_to_array($ret);
    }

    public function find_problem($text, $area, $orderby='problem_id')
    {
        // $erea can be title|content
        $regexObject = new MongoRegex("/{$text}/i");
        $condition = array($area => $regexObject);

        $need = array();
        $ret = $this->collection->find($condition, $this->i_need($need))
            ->sort(array($orderby => 1))
            ->limit(10);

        return iterator_to_array($ret);
    }

    public function delete($pid)
    {
        // set delete as mark
        $condition = array('problem_id' => $pid);
        $area = array('$set' => array('delete' => true, 'problem_id' => 'null'));

        $ret = $this->collection->update($condition, $area);

        return $ret;
    }

    public function save($post, $is_contest = false)
    {
        if (array_key_exists('problem_id', $post))
        {
            $condition = array('problem_id' => $post['problem_id']);
            $ret = $this->collection->update($condition, array('$set' => $post));
        } else {
            // TODO: new problem  with a problem id;
            $ret = $this->collection->save($post);
        }

        return $ret;
    }

}
