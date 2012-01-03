<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * all functions about contest
 *
 * @author freefcw
 */

class Model_Contest extends Model_Database {

    /**
        * get contest list for a page
        *
        * @access public
        * @param int the page id
        * @return array  a list of contest
        */
    public function get_list($page)
    {
        //use memcache
        $key = 'contest-'. $page;
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $query = DB::select()
                ->from('contest')
                ->order_by('contest_id', 'DESC')
                ->offset(($page - 1) * 25)
                ->limit(25);

        $result = $query->as_object()->execute();

        $ret = array();
        foreach($result as $r){
            $ret[] = $r;
        }
        
        $cache->set($key, $ret);
        return $ret;
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

        if (strtotime($contest->start_time) > $now) return false;
        return true;
    }
    /**
	 * fetch all the problems of contest
	 *
	 * @access	public
	 * @param       int         $contest_id
	 * @return      array       a list of problems in the contest
	 */
    public function get_contest_problems($contest_id)
    {
        //use memcache
        $key = 'contest-problems-'. $contest_id;
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $sql = "SELECT
                    problem.problem_id AS pid, problem.title AS title
                FROM
                    contest_problem
                LEFT JOIN
                    problem ON problem.problem_id = contest_problem.problem_id
                WHERE
                    contest_problem.contest_id = {$contest_id}
        ";

        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        $ret = array();
        foreach($result as $r)
        {
            $ret[] = $r;
        }

        $cache->set($key, $ret);
        return $ret;
    }

    /**
	 * count all the contest
	 * 
	 * @access	public
	 * @return	int	the number of contest
	 */
    public function get_total()
    {
        //use memcache
        $key = 'contest-total';
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $result = $this->_db->query(Database::SELECT, 'SELECT COUNT(*) as total FROM contest');

        $ret = $result->current()->total;
        $cache->set($key, $ret);
        return $ret;
    }

    /**
     *
     * @param <type> $contest_id
     * @@return
     */
    public function get_contest($contest_id)
    {
        //use memcache
        $key = "contest-total-{$contest_id}";
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $sql = "SELECT * FROM contest WHERE contest_id = {$contest_id}";

        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        $ret = $result->current();

        $cache->set($key, $ret);
        return $ret;
    }

    public function get_statistics($cid)
    {
        $key = "contest-stat-{$cid}";
        $cache = Cache::instance();
        $data = $cache->get($key, null);
        if(!is_null($data))
        {
           return $data;
        }

        $sql = "SELECT result, num, language FROM solution WHERE contest_id = {$cid}";

        $result = $this->_db->query(Database::SELECT, $sql, true);

        $data = array();
        $lang = array();
        foreach($result as $ret)
        {
            if (!array_key_exists($ret->num, $data)) $data[$ret->num] = array();
            if (!array_key_exists($ret->result, $data[$ret->num])) $data[$ret->num][$ret->result] = 0;

            if (!array_key_exists($ret->num, $lang)) $lang[$ret->num] = array();
            if (!array_key_exists($ret->language, $lang[$ret->num])) $lang[$ret->num][$ret->language] = 0;

            $data[$ret->num][$ret->result]++;
            $lang[$ret->num][$ret->language]++;
        }

        return array('result'=>$data, 'language'=>$lang);
    }

    public function get_contest_solutions($cid)
    {
        $sql = "SELECT user_id, result, num as cpid, in_date FROM solution WHERE contest_id = {$cid} ORDER BY user_id, in_date";
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        return $result;
    }
    public function get_standing($cid)
    {
        $key = "contest-standing-{$cid}";
        $cache = Cache::instance();
        $data = $cache->get($key, null);
        if (!is_null($data))
        {
            return $data;
        }

        $solutions = $this->get_contest_solutions($cid);
        $contest = $this->get_contest($cid);
        //calc the stand
        $data = array();
        $start_time = strtotime($contest->start_time);
        foreach($solutions as $s)
        {
            if(array_key_exists($s->user_id, $data))
            {
                $team = $data[$s->user_id];
                $team->add($s->cpid, strtotime($s->in_date) - $start_time, $s->result);
            } else {
                $team = new Model_Team();
                $team->add($s->cpid, strtotime($s->in_date) - $start_time, $s->result);
                $team->user_id = $s->user_id;
                $data[$s->user_id] = $team;
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
        $cache->set($key, $data, 30);

        return $data;
    }
}
