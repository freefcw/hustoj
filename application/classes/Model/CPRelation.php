<?php

/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 2:42 PM
 */

class Model_CPRelation extends Model_Save
{
    static $primary_key = 'contest_id';
    static $table = 'contest_problem';

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

    private $detail;

    public static function problems_for_contest($contest_id)
    {
        $query = DB::select()->from(self::$table)
            ->where('contest_id', '=', $contest_id)
            ->order_by('num');

        $result = $query->as_object(get_called_class())->execute();
        return $result->as_array();
    }

    public static function empty_contest($contest_id)
    {
        $query = DB::delete(self::$table)
            ->where('contest_id', '=', $contest_id);
        return $query->execute();
    }

    public function title()
    {
        $problem = $this->real_problem();
        if ($problem)
            return $problem->title;
        return '';
    }

    /**
     * @return Model_Problem
     */
    public function real_problem()
    {
        if ( ! $this->detail )
        {
            $this->detail = Model_Problem::find_by_id($this->problem_id);
        }
        return $this->detail;
    }

    public function display_order()
    {
        return e::contest_pid($this->num);
    }

    public function validate()
    {}

    protected function initial_data()
    {
        $this->title = '';
    }
}