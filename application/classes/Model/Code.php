<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 12:27 PM
 */

class Model_Code extends Model_Base
{
    static $cols = array(
        'solution_id',
        'source',
    );

    static $primary_key = 'solution_id';
    static $table = 'source_code';

    public $solution_id;
    public $source;


    /**
     * @param string $id
     *
     * @return Model_Code
     */
    public static function find_by_id($id)
    {
        return parent::find_by_id($id);
    }

    protected function initial_data()
    {}

    public function validate()
    {}
}