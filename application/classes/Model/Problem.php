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

    /**
     * @param        $text
     * @param        $area
     * @param string $orderby
     *
     * @return Model_Problem[]
     */
    public static function search($text, $area, $orderby = 'problem_id')
    {
        $term = "%{$text}%";
        $query = DB::select()->from(self::$table)
            ->where($area, 'LIKE', $term)
            ->limit(100)
            ->order_by($orderby, self::ORDER_DESC);

        $ret = $query->as_object(get_called_class())->execute();

        return $ret->as_array();
    }

    public function rejudge()
    {
        return Model_Solution::rejudge_problem($this->problem_id);
    }

    public function summary()
    {
        return Model_Solution::summary_for_problem($this->problem_id);
    }

    public function is_special_judge()
    {
        return $this->spj == '1';
    }

    public function best_solution($page=0, $limit=50)
    {
        return Model_Solution::solution_by_rank($this->problem_id, $page, $limit);
    }

    protected function initial_data()
    {
        $this->defunct = self::DEFUNCT_YES;
        $this->ratio = 0;
        $this->difficulty = 0;
        $this->case_time_limit = 0;
    }

    public function validate()
    {}
}
