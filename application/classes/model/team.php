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
    public $p_wa_count;
    public $p_ac_sec;
    public $start_time;

    function __construct()
    {
        $this->solved = 0;
        $this->p_wa_count = array();
        $this->p_ac_sec = array();
        $this->ac_list = array();
        $this->time = 0;
    }

    function set_start_time($time)
    {
        $this->start_time = $time;
    }
    function add($pid, $sec, $result)
    {
        if (!array_key_exists($pid, $this->p_ac_sec))
        {
            $this->p_ac_sec[$pid] = 0;
        }
        if (!array_key_exists($pid, $this->p_wa_count))
        {
            $this->p_wa_count[$pid] = 0;
        }

        if ($this->p_ac_sec[$pid] > 0) return;

        if ($result != 4)
            $this->p_wa_count[$pid]++;
        else{
            $this->p_ac_sec[$pid] = $sec;
            $this->ac_list[$pid] = true;
            $this->solved++;
            $this->time += $sec + $this->p_wa_count[$pid] * 1200;
        }
    }
}