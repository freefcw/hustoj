<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 2:42 PM
 */

class Model_ContestProblem extends Model_Base
{
    static $primary_key = 'solution_id';
    static $table = 'source_code';

    static $cols = array(
        'problem_id',
        'contest_id',
        'title',
        'num',
    );

    public $problem_id;
    public $contest_id;
    public $title;
    public $num;


    public function validate()
    {}

    protected function initial_data()
    {}
}