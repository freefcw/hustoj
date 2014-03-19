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
            $query->where('defunct', '=', self::DEFUNCT_NO);

        $ret = $query->as_object(get_called_class())->execute();

        return $ret->as_array();
    }

    /**
     * proxy to rejudge problem
     *
     * @return object
     */
    public function rejudge()
    {
        return Model_Solution::rejudge_problem($this->problem_id);
    }

    /**
     * status fro problem summary
     *
     * @return array
     */
    public function summary()
    {
        return Model_Solution::summary_for_problem($this->problem_id);
    }

    /**
     * get number of volumes
     *
     * @return float
     */
    public static function number_of_volume()
    {
        $filter = self::default_filter();

        $number_of_problems = Model_Problem::count($filter);
        $total_page = ceil( intval($number_of_problems) / OJ::per_page );

        return $total_page;
    }

    /**
     * problem list for volume
     *
     * @param int $volume page for volume
     *
     * @return Model_Problem[]
     */
    public static function problems_for_volume($volume)
    {
        $orderby = array(
            Model_Problem::$primary_key => Model_Base::ORDER_ASC
        );
        $filter = self::default_filter();
        return Model_Problem::find($filter, $volume, OJ::per_page, $orderby);
    }

    /**
     * default filter, with default
     *
     * @return array
     */
    public static function default_filter()
    {
        return $filter = array(
            'defunct' => Model_Base::DEFUNCT_NO
        );
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

    /**
     * is problem special judge
     * @return bool
     */
    public function is_special_judge()
    {
        return $this->spj == '1';
    }

    /**
     * best solutions for problem
     *
     * @param int $page
     * @param int $limit
     *
     * @return Model_Solution[]
     */
    public function best_solution($page=0, $limit=50)
    {
        return Model_Solution::solution_by_rank($this->problem_id, $page, $limit);
    }

    public function have_new_solution()
    {
        $this->submit = $this->submit + 1;
        $this->save();
    }

    protected function initial_data()
    {
        $this->in_date = e::format_time();
    }

    public function validate()
    {}
}
