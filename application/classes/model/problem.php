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

        $ret = $collection->findOne(array('problem_id' => intval($pid)));

        return $ret;
    }

    public function get_contest_problem($cid, $pid)
    {
        $sql = "SELECT
                    problem.problem_id AS problem_id, problem.title AS title, contest_problem.num AS num, time_limit, memory_limit, submit,
                    accepted, description, input, output, sample_input, sample_output, hint, source
                FROM
                    contest_problem
                LEFT JOIN
                    problem ON problem.problem_id = contest_problem.problem_id
                WHERE
                    contest_problem.contest_id = {$cid}
                    AND
                    contest_problem.num = {$pid}
        ";

        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        return $result->current();
    }

    public function get_page($page_id, $per_page = 50)
    {
        $collection = $this->db->selectCollection('problem');
        $start = ($page_id - 1) * $per_page + 1000;

        $cursor =$collection->find(array('problem_id' => array('$gte' => $start)),
            array('problem_id'=>1, 'title'=>1, 'accepted'=>1, 'submit'=>1))
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

        $ret = $collection->count(array('problem_id' => array('$exists' => true)));

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

    public function new_solution($post)
    {
        $sql = DB::select('problem_id')
                        ->from('contest_problem')
                        ->where('contest_id', '=', 1000)
                        ->and_where('num', '=', 0);

        if (isset($post['contest_id']))
        {
            //todo: fix get pid from contest
            $sql = DB::select('problem_id')
                ->from('contest_problem')
                ->where('contest_id', '=', $post['contest_id'])
                ->and_where('num', '=', $post['num']);

            $ret = $sql->execute()->current();
            $post['problem_id'] = $ret['problem_id'];

            $sql = DB::insert('solution', array('problem_id', 'user_id', 'in_date', 'language', 'ip', 'code_length', 'contest_id', 'num'))
                ->values(array($post['pid'], $post['user_id'], DB::expr('NOW()'), $post['language'], $post['ip'], strlen($post['source']), $post['cid'], $post['num']));
        } else {
            $sql = DB::insert('solution', array('problem_id', 'user_id', 'in_date', 'language', 'ip', 'code_length'))
                            ->values(array($post['pid'], $post['user_id'], DB::expr('NOW()'), $post['language'], $post['ip'], strlen($post['source'])));
        }

        list($insert_id, $affect_rows) = $sql->execute();

        //$sql = DB::query(Database::SELECT, "SELECT LAST_INSERT_ID() as last_insert_id FROM test");
        //$sql = DB::select(array(DB::expr('LAST_INSERT_ID()', 'last_insert_id')))->from('test');

        //TODO: combine source code to solution?
        $sql = DB::insert('source_code', array('solution_id', 'source'))
            ->values(array($insert_id, $post['source']));

        $ret = $sql->execute();

    }
}