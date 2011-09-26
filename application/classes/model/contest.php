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
        
        $cache->set($key, $ret, array('contest', 'list'));
        return $ret;
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

        $cache->set($key, $ret, array('contest', 'problem'));
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

        $result = $this->_db->query('SELECT COUNT(*) as total FROM contest');

        $ret = $result->current()->total;
        $cache->set($key, $ret, array('contest', 'total'));
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
        $key = 'contest-total';
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $query  = DB::select()
                ->from('contest')
                ->where('contest_id', '=', $contest_id);
        
        $result = $query->as_object()->execute();

        $ret = $result->current();

        $cache->set($key, $ret, array('contest', 'total'));
        return $ret;
    }

    public function get_statistics($cid)
    {}
}
