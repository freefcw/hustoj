<?php

/**
 * solution class use to control all judge 
 *
 * @author freefcw
 */
class Solution_Model extends Model_Database {

    public function __construct()
    {
            parent::__construct(); 
            //will load database library into $this->db, you can leave it out if you don't need it
    }

    public function create()
    {}

    public function judge()
    {}

    public function getStatus($page_id, $problem_id = null, $user_id = null, $lanaguage = null, $result = null)
    {
        $this->db->select('solution_id', 'problem_id', 'user_id', 'time', 'memory', 'language', 'result', 'code_length', 'in_date')
                ->from('solution')
                //->where()
                ->offset(($page_id - 1) * 20)
                ->limit(20)
                ->orderby('solution_id', 'DESC');

        return $this->db->get()->as_array();
    }
    
}
?>
