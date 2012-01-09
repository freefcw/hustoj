<?php
/**
 * User: freefcw
 * Date: 12-1-9
 * Time: 下午1:59
 * class of wrapper mongodb
 */
class MDB {
    public $connection = null;
    protected static $instance = null;
    public $db = null;

    private function __construct()
    {
        $config = Kohana::$config->load('database')->mongodb;

        $this->connection = new Mongo($config['connection']['dsn']);
        $this->db = $this->connection->$config['connection']['database'];
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new MDB();
            return self::$instance;
        }
        return self::$instance;
    }
}
