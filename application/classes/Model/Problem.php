<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * problems handle for hust online judge
 *
 * @author freefcw
 */

class Model_Problem extends Model_Base
{
    static $cols = array(
        'problem_id',
        'title',
        'description',
        'input',
        'output',
        'sample_input',
        'sample_output',
        'spj',
        'hint',
        'source',
        'sample_Program',
        'in_date',
        'time_limit',
        'memory_limit',
        'defunct',
        'accepted',
        'submit',
        'ratio',
        'error',
        'difficulty',
        'submit_user',
        'solved',
        'case_time_limit',
    );

    static $primary_key = 'problem_id';

    static $table = 'problem';

    public $problem_id;
    public $title;
    public $description;
    public $input;
    public $output;
    public $sample_input;
    public $sample_output;
    public $spj;
    public $hint;
    public $source;
    public $sample_Program;
    public $in_date;
    public $time_limit;
    public $memory_limit;
    public $defunct;
    public $accepted;
    public $submit;
    public $ratio;
    public $error;
    public $difficulty;
    public $submit_user;
    public $solved;
    public $case_time_limit;

    public static function find_problem($text, $area, $orderby = 'problem_id')
    {
        $query = DB::select()->from(self::$table)
            ->where($area, 'LIKE', $text)
            ->limit(100);

        $ret = $query->as_object(get_called_class())->execute();

        return $ret->as_array();
    }


    protected function initial_data()
    {}

    public function validate()
    {}
}
