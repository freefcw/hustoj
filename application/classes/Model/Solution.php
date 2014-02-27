<?php
/**
 * User: freefcw
 * Date: 12-1-10
 * Time: 上午1:16
 */
class Model_Solution extends Model_Base
{
    static $table = 'solution';
    static $primary_key = 'solution_id';

    const STATUS_PENDING         = 0;
    const STATUS_PENDING_REJUDGE = 1;
    const STATUS_COMPLIE         = 2;
    const STATUS_REJUDGING       = 3;
    const STATUS_AC              = 4;
    const STATUS_PE              = 5;
    const STATUS_WA              = 6;
    const STATUS_TLE             = 7;
    const STATUS_MLE             = 8;
    const STATUS_OLE             = 9;
    const STATUS_RE              = 10;
    const STATUS_CE              = 11;

    public static $status = array(
            4  => "Accepted",
            5  => "Presentation Error",
            6  => "Wrong Answer",
            7  => "Time Limit Exceed",
            8  => "Memory Limit Exceed",
            9  => "Output Limit Exceed",
            10 => "Runtime Error",
            11 => "Compile Error",
            0  => "Pending",
            1  => "Pending Rejudging",
            2  => "Compiling",
            3  => "Running &amp; Judging"
        );

    static $cols = array(
        'solution_id',
        'problem_id',
        'user_id',
        'time',
        'memory',
        'in_date',
        'result',
        'language',
        'ip',
        'contest_id',
        'valid',
        'num',
        'code_length',
        'judgetime',
    );

    public $solution_id;
    public $problem_id;
    public $user_id;
    public $time;
    public $memory;
    public $in_date;
    public $result;
    public $language;
    public $ip;
    public $contest_id = null;
    public $valid;
    public $num;
    public $code_length;
    public $judgetime;


    /**
     * @param string $id
     *
     * @return Model_Solution
     */
    public static function find_by_id($id)
    {
        return parent::find_by_id($id);
    }

    public static function summary_for_problem($problem_id)
    {
        $filter = array(
            'problem_id' => $problem_id,
        );
        $data = array();
        $data['total'] = self::count($filter);
        $data['submit_user'] = self::count_distinct_user($filter);

        $filter['result'] = self::STATUS_AC;
        $data['ac_user'] = self::count_distinct_user($filter);

        $data['more'] = array();
        $status = array(
            self::STATUS_AC,
            self::STATUS_PE,
            self::STATUS_WA,
            self::STATUS_TLE,
            self::STATUS_MLE,
            self::STATUS_OLE,
            self::STATUS_RE,
            self::STATUS_CE,
        );
        foreach($status as $st)
        {
            $filter['result'] = $st;
            $data['more'][$st] = self::count($filter);
        }
        return $data;
    }

    protected static function count_distinct_user($filter)
    {
        $query = DB::select(DB::expr('count(distinct(`user_id`)) as total'))->from(self::$table);
        foreach($filter as $k => $v)
        {
            $query->where($k, '=', $v);
        }

        $result = $query->execute();
        $result = $result->current();
        return $result['total'];
    }

    public function display_result()
    {
        return OJ::jresult($this->result);
    }

    public function display_language()
    {
        return OJ::lang($this->language);
    }

    /**
     * @param Model_User|string $user
     *
     * @return bool
     */
    public function allow_view_code($user)
    {
        if (is_string($user))
        {
            $user = Model_User::find_by_id($user);
        }
        if ( $user->user_id == $this->user_id ) return true;
        if ( $user->can_view_code() ) return true;

        return false;
    }

    public function code()
    {
        $code = Model_Code::find_by_id($this->solution_id);
        return $code->source;
    }

    /**
     * @param     $problem_id
     * @param int $page
     * @param int $limit
     *
     * @return array
     */
    public static function solution_by_rank($problem_id, $page=0, $limit=50)
    {
        $start = $page * $limit;

        $sql = "SELECT solution_id, count(*) att, user_id, language, memory, time, min(10000000000000000000 + time * 100000000000 + memory * 100000 + code_length) score, in_date
                FROM solution
                WHERE result = 4
                AND problem_id = {$problem_id}
                GROUP BY user_id
                ORDER BY score, in_date
                LIMIT {$start}, {$limit}";

        $result = DB::query(Database::SELECT, $sql)->execute();

        return $result->as_array();
    }

    public static function user_resolved_problem($user_id)
    {
        $query = DB::select(DB::expr('distinct(problem_id)'))->from(self::$table)
            ->where('user_id', '=', $user_id)
            ->where('result', '=', self::STATUS_AC);

        $plist = $query->execute()->as_array();

        $rlist = array();
        foreach($plist as $p) array_push($rlist, $p['problem_id']);
        return $rlist;
    }

    public static function user_tried_problem($user_id)
    {
        $query = DB::select()->from(self::$table)
            ->where('user_id', '=', $user_id)
            ->group_by('problem_id')
            ->having('result', '!=', self::STATUS_AC);

        $plist = $query->execute()->as_array();
        $rlist = array();
        foreach($plist as $p) array_push($rlist, $p['problem_id']);
        return $rlist;
    }

    /**
     * 重新判这个解题
     */
    public function rejudge()
    {
        $this->result = self::STATUS_PENDING_REJUDGE;
        $this->save();
    }

    /**
     *
     * 重判某个题目
     * @param $problem_id
     *
     * @return object
     */
    public static function rejudge_problem($problem_id)
    {
        $data = array(
            'result' => self::STATUS_PENDING_REJUDGE,
        );
        $query = DB::update(self::$table)
            ->set($data)
            ->where('problem_id', '=', $problem_id);

        $result = $query->execute();
        return $result;
    }

    /**
     * @param $contest_id
     * @param $start
     * @param $end
     *
     * @return Model_Solution[]
     */
    public static function find_solution_for_contest($contest_id, $start, $end)
    {
        $query = DB::select()->from(self::$table)
            ->where('contest_id', '=', $contest_id)
            ->where('in_date', '>', $start)
            ->where('in_date', '<', $end)
            ->order_by('user_id')
            ->order_by('in_date');

        $result = $query->as_object(get_called_class())->execute();
        return $result->as_array();
    }

    protected function initial_data()
    {
        $this->time   = 0;
        $this->memory = 0;
        $this->in_date = OJ::format_time();
        $this->result = self::STATUS_PENDING;
        $this->valid = 1;
        $this->num = -1;
    }

    public function validate()
    {}
}
