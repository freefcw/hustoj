<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * problems handle for hust online judge
 *
 * @author freefcw
 */

class Model_Problem extends Model_Database {

    public function get_problem($pid)
    {
        $key = 'problem-'. $pid;
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;
        
        //fetch data
        $query = DB::select()
            ->from('problem')
            ->where('problem_id', '=', $pid);
        
        $result = $query->as_object()->execute();

        $ret = $result->current();
        $cache->set($key, $ret, 60);

        return $ret;
    }

    public function get_page($page_id, $per_page)
    {
        $key = 'problem-page-'. $page_id;
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        //fetch data
        /*$sql = 'SELECT title from problem limit 100';
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);
        foreach($result as $r) {
            echo $r->title, '<br />';
        }*/

        $query = DB::select('problem_id', 'title', 'accepted', 'submit')
            ->from('problem')
            ->offset(($page_id - 1) * $per_page)
            ->limit($per_page)
            ->order_by('problem_id');

        $result = $query->as_object()->execute();

        $ret = array();
        foreach($result as $r){
            $ret[] = $r;
        }
        $cache->set($key, $ret, 60);
        return $ret;
    }
    /**
    * return total problems
    *
    *  @author freefcw
    *  @return int
    */
    public function get_total()
    {
        $key    = 'problem-total';
        $cache  = Cache::instance();
        $data   = $cache->get($key);
        if ($data != null) return $data;
        
        $sql = 'SELECT count(*) AS total FROM problem';
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        $ret = $result->current()->total;

        $cache->set($key, $ret, 60);
        return $ret;
    }

    /**
     * get recent problem information for index page
     *
     * @return array
     */
    public function get_recent()
    {
        $key    = 'problem-index';
        $cache  = Cache::instance();
        $data   = $cache->get($key);
        if ($data != null) return $data;

        //fetch data
        $query = DB::select('problem_id', 'title', 'in_date')
            ->from('problem')
            ->limit(5)
            ->order_by('in_date', 'DESC');

        //TODO: fixit
        $result = $query->as_object()->execute();
        $cache->set($key, $result, 60);
        return $result;
    }

    public function get_status($page_id = 1, $problem_id = null, $user_id = null, $cid = null, $language = null, $result = null)
    {
        // fixme: add more set
        $query = DB::select('solution_id', 'problem_id', 'user_id', 'time', 'memory', 'language', 'result', 'code_length', 'in_date')
                ->from('solution')
                ->offset(($page_id - 1) * 20)
                ->limit(20)
                ->order_by('solution_id', 'DESC');

        if (!is_null($problem_id) AND !is_null($user_id) AND !is_null($user_id) AND !is_null($cid) AND !is_null($language) AND !is_null($result))
	    {
	        $query->where_open();
	        if (! is_null($problem_id))
		    {
		    	$query->where('problem_id', '=', $problem_id);
		    }
		    if (! is_null($user_id))
		    {
		    	$query->where('user_id', '=', $user_id);
		    }
		    if (!is_null($language))
	        {
	        	$query->where('language', '=', $language);
	        }
	        if (!is_null($result))
	        {
	        	$query->where('result', '=', $result);
	        }
            if (! is_null($cid))
            {
                $query->where('contest_id', '=', $cid);
            }
	        $query->where_close();
    	}

        $result = $query->as_object()->execute();

        $ret = array();
        foreach($result as $r){
            $ret[] = $r;
        }

        return $ret;
    }

    public function get_summary($pid)
    {
        # TODO: add content
        $key    = "summary-{$pid}";
        $cache  = Cache::instance();
        $data   = $cache->get($key);
        if ($data != null){
            return $data;
        }

        $data = array();
        // get total solutions
        $sql = "SELECT count(*) AS total FROM solution WHERE problem_id='{$pid}'";
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);
        $data['total'] = $result->current()->total;

        // get total user has submited
        $sql = "SELECT count(DISTINCT user_id) AS total FROM solution WHERE problem_id='{$pid}'";
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);
        $data['submit_user'] = $result->current()->total;

        // get total user has ac
        $sql = "SELECT count(DISTINCT user_id) AS total FROM solution WHERE problem_id='{$pid}'  AND result='4'";
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);
        $data['ac_user'] = $result->current()->total;

        // get all status
        $sql = "SELECT result, count(*) as total FROM solution WHERE problem_id='{$pid}' AND result>=4 GROUP BY result ORDER BY result";
        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        $data['more'] = $result->as_array();
        $cache->set($key, $data, 60);
        return $data;
    }

    public function get_best_solution($pid, $start = 0, $limit = 20)
    {
        # TODO: add content
		$key	= "search-$pid-best";
		$cache	= Cache::instance();
		$data	= $cache->get($key);
		if ($data != null) {
			return $data;
		}
		$sql 	= "SELECT solution_id, count(*) att, user_id, language, memory, time, min(10000000000000000000 + time *100000000000 + memory *100000 + code_length) score, in_date
					FROM solution
					WHERE result = 4
					GROUP BY user_id
					ORDER BY score, in_date
					LIMIT $start, $limit";
		$result = $this->_db->query(Database::SELECT, $sql, TRUE);

		$ret = array();
		foreach($result as $i)
		{
			$ret[] = $i;
		}

        $cache->set($key, $ret, 60);

        return $ret;
    }
    
    public function find_problem($text, $area)
	{
		// TODO: add permission
        $key    = "search-$text-$area";
        $cache  = Cache::instance();
        $data   = $cache->get($key);
        if ($data != null){
            return $data;
        }
		$query = DB::select('problem_id', 'title', 'submit', 'accepted', 'source')
				->from('problem')
				->where($area, 'like', "%{$text}%")
				->order_by('problem_id');

        $result = $query->as_object()->execute();

        $ret = array();
        foreach($result as $r){
            $ret[] = $r;
        }
        
        $cache->set($key, $ret, 60);
        return $ret;
	}
	
	public function get_status_count($problem_id = '', $user_id = '', $language = -1, $result = -1)
	{   
        $sql = 'SELECT count(*) AS total FROM solution';
        
		$append = '';
        if (!(($problem_id == '') AND ($user_id == '') AND ($language == -1) AND ($result == -1)))
	    {
			$append = ' WHERE (';
			$flag = FALSE;
	        if ($problem_id != '')
		    {
		    	$append = $append."`problem_id` = '{$problem_id}'";
		    	$flag = TRUE;
		    }
		    if ($user_id != '')
		    {
		    	if ($flag) $append = $append. ' AND ';
		    	$append = $append."`user_id` = '{$user_id}'";
		    	$flag = TRUE;
		    }
		    if ($language != -1)
	        {
	        	if ($flag) $append = $append. ' AND ';
	        	$append = $append."`language` = '{$language}'";
	        	$flag = TRUE;
	        }
	        if ($result != -1)
	        {
	        	if ($flag) $append = $append. ' AND ';
	        	$append = $append."`result` = '{$result}'";
	        	$flag = TRUE;
	        }
	        $append = $append. ')';
    	}
    	$sql = $sql. $append;

    	$result = $this->_db->query(Database::SELECT, $sql, TRUE);
    	$ret = $result->current()->total;
    	
    	return $ret;
	}
}