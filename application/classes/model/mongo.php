<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * User: freefcw
 * Date: 12-1-7
 * Time: 上午2:31
 */
class Model_Mongo {
    public $connection = null;
    public $db = null;

    public function __construct()
    {
        $this->connection = MDB::getInstance();
        $this->db = $this->connection->db;
    }

    /**
     * @param $data
     * @return array
     *
     * make a map array
     */
    public function i_need($data)
    {
        $nt = array();
        foreach($data as $item) $nt[$item] = 1;

        return $nt;
    }

}
