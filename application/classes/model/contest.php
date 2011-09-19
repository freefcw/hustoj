<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * all functions about contest
 *
 * @author freefcw
 */

class Contest_Model extends Model_Database {
    /**
        * construct function
        */
    public function __construct()
    {
        parent::__construct();
    }

    /**
        * get contest list for a page
        *
        * @access public
        * @param int the page id
        * @return array  a list of contest
        */
    public function getContestList($page)
    {
        //use memcache
        $key = 'contest-'. $page;
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $this->db->from('contest')
                        ->orderby('start_time', 'DESC')
        ->offset(($page - 1) * 25)
        ->limit(25);

        $result = $this->db->get()->as_array();
        $cache->set($key, $result, array('contest', 'list'));
        return $result;
    }
    /**
	 * fetch all the problems of contest
	 *
	 * @access	public
	 * @param       int         $contest_id
	 * @return      array       a list of problems in the contest
	 */
    public function getProblemList($contest_id)
    {
        //use memcache
        $key = 'contest-problems-'. $contest_id;
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $sql = "SELECT
                    problem.problem_id, problem.title
                FROM
                    contest_problem
                LEFT JOIN
                    problem ON problem.problem_id = contest_problem.problem_id
                WHERE
                    contest_problem.contest_id = {$contest_id}
        ";

        $res = $this->db->query($sql);
        //var_dump($result);
        $result = $res->as_array();

        $cache->set($key, $result, array('contest', 'problem'));
        return $result;
    }

    /**
	 * count all the contest
	 * 
	 * @access	public
	 * @return	int	the number of contest
	 */
    public function getTotal()
    {
        //use memcache
        $key = 'contest-total';
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $res = $this->db->query('SELECT COUNT(*) as total FROM contest');

        $result = $res->current()->total;
        $cache->set($key, $result, array('contest', 'total'));
        return $result;
    }

    /**
     *
     *
     * @param <type> $contest_id
     * @@return
     */
    public function getContestInfo($contest_id)
    {
        //use memcache
        $key = 'contest-total';
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $res = $this->db->query("SELECT * FROM contest WHERE contest_id = {$contest_id}");

        $result = $res->current();
        $cache->set($key, $result, array('contest', 'total'));
        return $result;
    }
}
