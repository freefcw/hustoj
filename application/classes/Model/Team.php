<?php
/**
 * User: freefcw
 * Date: 12-1-3
 * Time: 下午7:28
 */
class Model_Team
{
    public $user_id;
    public $solved = 0;
    public $time = 0;
//    public $problem_wa_count;
//    public $problem_ac_sec;
    protected $problem_list;

    public function __construct()
    {
        $this->solved           = 0;
//        $this->problem_wa_count = array();
//        $this->problem_ac_sec   = array();
//        $this->ac_list          = array();
        $this->problem_list     = array();
        $this->time             = 0;
    }

    public function problem_status($problem_id)
    {
        if ( ! array_key_exists($problem_id, $this->problem_list) )
            return $this->new_problem();
        return $this->problem_list[$problem_id];
    }

    public function add($problem_id, $time, $result)
    {
//        if (!array_key_exists($problem_id, $this->problem_ac_sec))
//        {
//            $this->problem_ac_sec[$problem_id] = 0;
//        }
//        if (!array_key_exists($problem_id, $this->problem_wa_count))
//        {
//            $this->problem_wa_count[$problem_id] = 0;
//        }
        if ( ! array_key_exists($problem_id, $this->problem_list) )
            $this->problem_list[$problem_id] = $this->new_problem();

        $pdata = $this->problem_list[$problem_id];
        if ( $pdata['accept_at'] > 0) return;

        if ( $result != Model_Solution::STATUS_AC )
            $pdata['wa_count']++;
        else {
            $pdata['accept_at'] = $time;
            $this->solved++;
            $this->time += $time + $pdata['wa_count'] * 1200;
        }
        $this->problem_list[$problem_id] = $pdata;

//        if ($this->problem_ac_sec[$problem_id] > 0) return;
//
//        if ($result != 4)
//            $this->problem_wa_count[$problem_id]++;
//        else{
//            $this->problem_ac_sec[$problem_id] = $time;
//            $this->ac_list[$problem_id] = true;
//            $this->solved++;
//            $this->time += $time + $this->problem_wa_count[$problem_id] * 1200;
//        }
    }

    protected function new_problem()
    {
        return array(
            'accept_at' => 0, // accept time
            'wa_count' => 0,
        );
    }
}