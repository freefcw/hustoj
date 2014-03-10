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
        'in_date',
        'time_limit',
        'memory_limit',
        'defunct',
        'accepted',
        'submit',
        'solved',
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
    public $source = '';
    public $in_date;
    public $time_limit;
    public $memory_limit;
    public $defunct = self::DEFUNCT_YES;
    public $accepted;
    public $submit = 0;
    public $solved = 0;

    /**
     * @param       $text
     * @param       $area
     * @param array $orderby
     * @param bool  $show_all
     *
     * @return Model_Problem[]
     */
    public static function search($text, $area, $orderby = array(), $show_all=false)
    {
        $term = "%{$text}%";
        $query = DB::select()->from(self::$table)
            ->where($area, 'LIKE', $term)
            ->limit(100);

        foreach($orderby as $key => $order)
        {
            $query->order_by($key, $order);
        }

        if ( ! $show_all )
            $query->where('defunct', '=', 'N');

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

    /**
     * @param Model_User $user
     *
     * @return bool
     */
    public function can_user_access($user)
    {
        if  ( ! $this->is_defunct() ) return true;
        if ($user AND $user->is_admin()) return true;
        return false;
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
        $this->in_date = e::format_time();
    }

    public function validate()
    {}
}
