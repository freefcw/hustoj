<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 2:16 PM
 */

/**
 *
 * Class for Complie Info notice
 *
 * Class Model_CInfo
 */
class Model_CInfo extends Model_Save
{
    static $cols = array(
        'solution_id',
        'error',
    );

    static $primary_key = 'solution_id';

    static $table = 'compileinfo';

    public $solution_id;
    public $error;

    /**
     * @param string $id
     *
     * @return Model_CInfo
     */
    public static function for_solution($id)
    {
        $filter = array(
            'solution_id' => $id,
        );
        $result = self::find($filter);
        if ($result)
            return $result[0];

        return null;
    }

    protected function initial_data()
    {}

    public function validate()
    {}
}