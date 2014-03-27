<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 12:27 PM
 */

class Model_Code extends Model_Save {
    static $cols
        = array(
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
        $filter = array(
            'solution_id' => $id,
        );

        $result = self::find($filter);

        if ($result) return $result[0];

        return null;
    }

    /**
     * @param Model_Solution $solution
     *
     * @return null
     */
    public static function for_solution($solution)
    {
        $code = Model_Code::find_by_id($solution->solution_id);

        if ( $code )
        {
            return $code->source;
        }
        return null;
    }


    protected function initial_data()
    {}

    public function validate()
    {}
}