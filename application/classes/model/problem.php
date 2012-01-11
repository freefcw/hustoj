<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * problems handle for hust online judge
 *
 * @author freefcw
 */

class Model_Problem extends Model_Mongo {

    public function get_problem($pid)
    {
        $collection = $this->db->selectCollection('problem');

        $condition = array('problem_id' => intval($pid));
        $ret = $collection->findOne($condition);

        return $ret;
    }

    public function get_problem_by_id($id)
    {
        $collection = $this->db->selectCollection('problem');

        $condition = array('_id' => $id);
        $ret = $collection->findOne($condition);

        return $ret;

    }

    public function get_page($page_id, $per_page = 50)
    {
        $collection = $this->db->selectCollection('problem');
        $start = ($page_id - 1) * $per_page + 1000;

        $condition = array('problem_id' => array('$gte' => $start));
        $need = array('problem_id', 'title', 'accepted', 'submit');
        $cursor =$collection->find($condition, $this->i_need($need))
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
        $collection = $this->db->selectCollection('problem');

        $condition = array('problem_id' => array('$exists' => true));
        $ret = $collection->count($condition);

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
        $collection = $this->db->selectCollection('problem');

        $condition = array();
        $need = array();

        $ret = $condition->find($condition, $this->i_need($need))
            ->sort(array('problem_id' => -1))
            ->limit($count);

        return iterator_to_array($ret);
    }

    public function find_problem($text, $area)
    {
        $collection = $this->db->selectCollection('problem');

        // $erea can be title|content
        $regexObject = new MongoRegex("/{$text}/i");
        $condition = array($area => $regexObject);

        $ret = $collection->find($condition)
            ->sort(array('problem_id' => 1));

        return iterator_to_array($ret);
    }
}