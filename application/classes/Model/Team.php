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
    public $problem_wa_count;
    public $problem_ac_sec;

    public function __construct()
    {
        $this->solved = 0;
        $this->problem_wa_count = array();
        $this->problem_ac_sec = array();
        $this->ac_list = array();
        $this->time = 0;
    }

    public function add($pid, $sec, $result)
    {
        if (!array_key_exists($pid, $this->problem_ac_sec))
        {
            $this->problem_ac_sec[$pid] = 0;
        }
        if (!array_key_exists($pid, $this->problem_wa_count))
        {
            $this->problem_wa_count[$pid] = 0;
        }

        if ($this->problem_ac_sec[$pid] > 0) return;

        if ($result != 4)
            $this->problem_wa_count[$pid]++;
        else{
            $this->problem_ac_sec[$pid] = $sec;
            $this->ac_list[$pid] = true;
            $this->solved++;
            $this->time += $sec + $this->problem_wa_count[$pid] * 1200;
        }
    }
}