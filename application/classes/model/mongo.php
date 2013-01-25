<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * User: freefcw
 * Date: 12-1-7
 * Time: 上午2:31
 */
class Model_Mongo
{
    public $conn = null;
    public $db = null;
    protected $auto_db = null;

    public function __construct()
    {
        $this->conn = MDB::getInstance();
        $this->db = $this->conn->db;
        $this->auto_db = $this->db->selectCollection('counters');
    }

    /**
     * @param $data
     *
     * @return array
     *
     * make a map array
     */
    public function i_need($data)
    {
        $nt = array();
        foreach ($data as $item) {
            $nt[$item] = 1;
        }

        return $nt;
    }

    /**
     * @param $field_name
     *
     * @return mixed
     */
    public function get_new_id($field_name)
    {
        $result = $this->db->command(
            array(
                 "findandmodify" => "counters",
                 array(),
                 "update"        => array('$inc' => array($field_name => 1)),
            )
        );
        return $result['value'][$field_name];
        /*
         * support by mongodb 1.3
        return $this->auto_db->findAndModify(
            array(),
            array('$inc' => array($field_name => 1))
        );*/
    }

}
