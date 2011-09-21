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
        $cache->set($key, $ret, array('problem'));

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
        $cache->set($key, $ret, array('problem', 'page'));
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

        $cache->set($key, $ret, array('problem','total'));
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
        $cache->set($key, $result, array('problem', 'page'));
        return $result;
    }

    public function get_status($page_id = 1, $problem_id = null, $user_id = null, $lanaguage = null, $result = null)
    {
        // fixme: add more set
        $key    = "status-{$page_id}--";
        $cache  = Cache::instance();
        $data   = $cache->get($key);
        $query = DB::select('solution_id', 'problem_id', 'user_id', 'time', 'memory', 'language', 'result', 'code_length', 'in_date')
                ->from('solution')
                //->where()
                ->offset(($page_id - 1) * 20)
                ->limit(20)
                ->order_by('solution_id', 'DESC');

        $result = $query->as_object()->execute();

        $ret = array();
        foreach($result as $r){
            $ret[] = $r;
        }
        
        $cache->set($key, $ret, array('problem', 'page'));
        return $ret;
    }
}