<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * all functions about contest
 *
 * @author freefcw
 */

class Model_Contest extends Model_Base
{
    static $cols = array(
        'contest_id',
        'title',
        'start_time',
        'end_time',
        'defunct',
        'description',
        'private',
    );

    static $primary_key = 'contest_id';

    static $table = 'contest';

    public $contest_id;
    public $title;
    public $start_time;
    public $end_time;
    public $defunct;
    public $description;
    public $private;

    /**
     * @param string $id
     *
     * @return Model_Contest
     */
    public static function find_by_id($id)
    {
        return parent::find_by_id($id);
    }


    /**
     * @return Model_Problem[]
     */
    public function problems()
    {
//        DB::select()->from()
    }

    /**
     * @param $cid
     *
     * @return bool
     *
     * is contest opened
     */
    public function is_open($cid)
    {
        $now = time();

        if ($this->start_time > $now) return false;

        return true;
    }


    /**
     *
     * @param <type> $contest_id
     *
     * @return mixed
     */
    public function get_contest($contest_id)
    {
        $condition = array('contest_id' => intval($contest_id));
        $need = array();

        $result = $this->collection->findOne($condition);
        return $result;
    }

    /**
     * @param $cid
     *
     * @return array
     */
    public function get_statistics($cid)
    {
        $collection = $this->db->selectCollection('solution');

        $condition = array('contest_id' => intval($cid));
        $need = array('result', 'num', 'language');

        $result = $collection->find($condition, $this->i_need($need));

        $data = array();
        $lang = array();
        foreach ($result as $ret) {
            if (!array_key_exists($ret['num'], $data)) {
                $data[$ret['num']] = array();
            }
            if (!array_key_exists($ret['result'], $data[$ret['num']])) {
                $data[$ret['num']][$ret['result']] = 0;
            }

            if (!array_key_exists($ret['num'], $lang)) {
                $lang[$ret['num']] = array();
            }
            if (!array_key_exists($ret['language'], $lang[$ret['num']])) {
                $lang[$ret['num']][$ret['language']] = 0;
            }

            $data[$ret['num']][$ret['result']]++;
            $lang[$ret['num']][$ret['language']]++;
        }

        return array('result' => $data, 'language' => $lang);
    }

    /**
     * @param $cid
     *
     * @return array
     */
    public function get_contest_solutions($cid)
    {
        $collection = $this->db->selectCollection('solution');

        $condition = array('contest_id' => intval($cid));
        $need = array('user_id', 'result', 'num', 'add_date');

        $result = $collection->find($condition, $this->i_need($need))
            ->sort(array('user_id' => 1, 'add_date' => 1));

//        $sql = "SELECT user_id, result, num as cpid, in_date FROM solution WHERE contest_id = {$cid} ORDER BY user_id, in_date";
//        $result = $this->_db->query(Database::SELECT, $sql, TRUE);

        return iterator_to_array($result);
    }

    /**
     * @param $cid
     *
     * @return array
     */
    public function get_standing($cid)
    {
        $solutions = $this->get_contest_solutions($cid);
        $contest = $this->get_contest($cid);
        //calc the stand
        $data = array();
        $start_time = $contest['start_time']->sec;
        foreach ($solutions as $s) {
            if (array_key_exists($s['user_id'], $data)) {
                $team = $data[$s['user_id']];
                $team->add($s['num'], $s['add_date']->sec - $start_time, $s['result']);
            } else {
                $team = new Model_Team();
                $team->add($s['num'], $s['add_date']->sec - $start_time, $s['result']);
                $team->user_id = $s['user_id'];
                $data[$s['user_id']] = $team;
            }
        }
        usort(
            $data, function ($a, $b) {
                if ($a->solved > $b->solved) {
                    return false;
                }
                if ($a->solved == $b->solved) {
                    if ($a->time < $b->time) {
                        return false;
                    }
                }
                ;
                return true;
            }
        );

        return $data;
    }

    /**
     * @param $cid
     *
     * @return array
     */
    public function get_contest_problems($cid)
    {
        $contest = $this->get_contest($cid);

        if (isset($contest['plist'])) {
            return $contest['plist'];
        }

        return array();
    }

    /**
     * @param $cid
     *
     * @return array
     */
    public function get_user_of_contest($cid)
    {
        $collection = $this->db->selectCollection('privilege');

        $condition = array('contest_id' => $cid);
        $ret = $collection->find($condition);
        return iterator_to_array($ret);
    }

    /**
     * @param $cid
     * @param $user_list
     *
     * @return void
     */
    public function add_user_to_contest($cid, $user_list)
    {
        $collection = $this->db->selectCollection('privilege');

        foreach($user_list as $user_id)
        {
            $item = array(
                'contest_id' => $cid,
                'user_id'    => $user_id
            );
            $collection->save($item);
        }
    }

    /**
     * @param $cid
     * @param $user_id
     */
    public function remove_user_from_contest($cid, $user_id)
    {
        $collection = $this->db->selectCollection('privilege');

        $condition = array(
            'contest_id' => $cid,
            'user_id'    => $user_id,
        );

        $collection->remove($condition);
    }

    public function initial_data()
    {}

    public function validate()
    {}
}
