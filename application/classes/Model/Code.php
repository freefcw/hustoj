<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 12:27 PM
 */

class Model_Code extends Model_Save
{
    static $cols = array(
        'solution_id',
        'source',
    );

    static $primary_key = 'solution_id';
    static $table = 'source_code';

    public $solution_id;
    public $source;




    protected function initial_data()
    {}

    public function validate()
    {}
}