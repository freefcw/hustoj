<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * all functions about contest
 *
 * @author freefcw
 */

class Model_Contest extends Model_Mongo{

    public function __construct()
    {
        parent::__construct();
        $this->collection = $this->db->selectCollection('contest');
    }
    /**
     * get contest list for a page
     *
     * @access public
     * @param $page
     * @param int $per_page
     * @internal param \the $int page id
     * @return array  a list of contest
     */
    public function get_list($page, $per_page = 25)
    {
        $condition = array();
        $need = array();

        $result = $this->collection->find()
            ->sort(array('contest_id'=>-1))
            ->skip($per_page * ($page - 1))
            ->limit($per_page);

        return iterator_to_array($result);
    }

    /**
     * @param $cid
     * @return bool
     *
     * is contest opened
     */
    public function is_contest_open($cid)
    {
        $contest = $this->get_contest($cid);

        $now = time();

        if ($contest['start_time']->sec > $now) return false;
        return true;
    }
    /**
	 * count all the contest
	 * 
	 * @access	public
	 * @return	int	the number of contest
	 */
    public function get_total()
    {
        $collection = $this->db->selectCollection('contest');

        $result = $collection->count();

        return $result;
    }

    /**
     *
     * @param <type> $contest_id
     * @return mixed
     */
    public function get_contest($contest_id)
    {
        $condition = array('contest_id'=>intval($contest_id));
        $need = array();

        $result = $this->collection->findOne($condition);
        return $result;
    }

    public function get_statistics($cid)
    {
        $collection = $this->db->selectCollection('solution');

        $condition = array('contest_id' => intval($cid));
        $need = array('result', 'num', 'language');

        $result = $collection->find($condition, $this->i_need($need));

        $data = array();
        $lang = array();
        foreach($result as $ret)
        {
            if (!array_key_exists($ret['num'], $data)) $data[$ret['num']] = array();
            if (!array_key_exists($ret['result'], $data[$ret['num']])) $data[$ret['num']][$ret['result']] = 0;

            if (!array_key_exists($ret['num'], $lang)) $lang[$ret['num']] = array();
            if (!array_key_exists($ret['language'], $lang[$ret['num']])) $lang[$ret['num']][$ret['language']] = 0;

            $data[$ret['num']][$ret['result']]++;
            $lang[$ret['num']][$ret['language']]++;
        }

        return array('result'=>$data, 'language'=>$lang);
    }

    public function get_contest_solutions($cid)
    {
        $collection = $this->db->selectCollection('solution');

        $condition = array('contest_id' => intval($cid));
        $need = array('user_id', 'result', 'num', 'add_date');

        $result = $collection->find($condition, $this->i_need($need))
            ->sort(array('user_id'=>1, 'add_date'=>1));

//        $sql = "SELECT user_id, result, num as cpid, in_date FROM solution WHERE contest_id = {$cid} ORDER BY user_id, in_date";
//        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        return iterator_to_array($result);
    }
    public function get_standing($cid)
    {
        $solutions = $this->get_contest_solutions($cid);
        $contest = $this->get_contest($cid);
        //calc the stand
        $data = array();
        $start_time = $contest['start_time']->sec;
        foreach($solutions as $s)
        {
            if(array_key_exists($s['user_id'], $data))
            {
                $team = $data[$s['user_id']];
                $team->add($s['num'], $s['add_date']->sec - $start_time, $s['result']);
            } else {
                $team = new Model_Team();
                $team->add($s['num'], $s['add_date']->sec - $start_time, $s['result']);
                $team->user_id = $s['user_id'];
                $data[$s['user_id']] = $team;
            }
        }
        usort($data, function($a, $b){
            if ($a->solved > $b->solved)
                return false;
            if ($a->solved == $b->solved) {
                if ($a->time < $b->time) return false;
            };
            return true;
        });

        return $data;
    }

    public function get_contest_problems($cid)
    {
        $contest = $this->get_contest($cid);

        if (isset($contest['plist']))
            return $contest['plist'];

        return array();
    }
}
