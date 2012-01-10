<?php
/**
 * User: freefcw
 * Date: 12-1-10
 * Time: 上午1:16
 */
class Model_Submission extends Model_Mongo
{
    public function get_status($page_id = 1, $problem_id = -1, $user_id = '', $cid = null, $language = -1, $result = -1)
    {
        //TODO: move to solutions
        $collection = $this->db->selectCollection('solution');

        $condition = array();
        if ($problem_id != -1 AND $problem_id !== null) $condition['problem_id'] = intval($problem_id);
        if ($user_id !== null) $condition['user_id'] = $user_id;
        if (($language != -1) AND ($language !== null)) $condition['language'] = intval($language);
        if (($result != -1) AND ($language !== null)) $condition['result'] = intval($result);
        if ($cid != null) $condition['contest_id'] = intval($cid);

        $need = array('solution_id', 'problem_id', 'user_id', 'time', 'memory', 'language', 'result', 'code_length', 'add_date');

        $per_page = 20;
        $ret = $collection->find($condition, $this->i_need($need))
            ->sort(array('solution_id' => -1))
            ->limit($per_page)
            ->skip(($page_id - 1) * $per_page);

        return iterator_to_array($ret);
    }

    public function get_summary($pid)
    {
        # TODO: add content
        $data = array();
        $pid = intval($pid);
        // get total solutions
        $collection = $this->db->selectCollection('solution');
        $condition = array('problem_id' => $pid);
        $data['total'] = $collection->find($condition)->count();

        // get total user has submited
        $result = $this->db->command(array('distinct' => 'solution', 'key' => 'user_id', 'query' => $condition));
        $data['submit_user'] = count($result['values']);

        // get total user has ac
        $condition = array('problem_id' => $pid, 'result' => 4);
        $result = $this->db->command(array('distinct' => 'solution', 'key' => 'user_id', 'query' => $condition));
        //no this method:$result = $collection->find($condition)->distinct('user_id');
        $data['ac_user'] = count($result['values']);

        // get all status
        $data['more'] = array();
        for($i = 4; $i <= 11; $i++)
        {
            $condition['result'] = $i;
            $ret = $collection->find($condition)->count();
            $data['more'][$i] = $ret;
        }
        return $data;
    }

    public function get_best_solution($pid, $start = 0, $limit = 20)
    {
        # TODO: add content

        $collection = $this->db->selectCollection('solution');

        $condition = array('result'=>4);
        $need = array('solution_id', 'user_id', 'language', 'memory', 'add_date', 'time', 'score');

        //$ret = $collection->find($condition, $this->i_need($need))->sort('score')->sort($this->i_need(array('score', 'add_date')));
        $ret = $collection->find($condition, $this->i_need($need))->sort(array('time'=>1, 'memory'=>1))->limit(50);

		$sql 	= "SELECT solution_id, count(*) att, user_id, language, memory, time, min(10000000000000000000 + time *100000000000 + memory *100000 + code_length) score, in_date
					FROM solution
					WHERE result = 4
					GROUP BY user_id
					ORDER BY score, in_date
					LIMIT $start, $limit";


        return iterator_to_array($ret);
    }

	public function get_status_count($problem_id = '', $user_id = '', $language = -1, $result = -1)
	{
        //TODO: move to solutions
        $collection = $this->db->selectCollection('solution');

        $condition = array();
        if (! is_null($problem_id)) $condition['problem_id'] = $problem_id;
        if (! is_null($user_id)) $condition['user_id'] = $user_id;
        if (! is_null($language)) $condition['language'] = $language;
        if (! is_null($result)) $condition['result'] = $result;
        //if (! is_null($cid)) $condition['cid'] = $cid;

        $ret = $collection->count($condition);
        return $ret;
	}

    public function new_solution($post)
    {
        $collection = $this->db->selectCollection('solution');
        // contest solution or normal solution
        $new_doc = array(
            'p_id' => intval($post['pid']),
            'user_id' => $post['user_id'],
            'add_date' => new MongoDate(time()),
            'language' => intval($post['language']),
            'ip' => Request::$client_ip,
            'code_length' => strlen($post['source']),
            'contest_id' => intval($post['cid']),
            'num' => intval($post['num']),
            'source' => $post['source'],
        );

        //$collection->save($new_doc);
    }
}
