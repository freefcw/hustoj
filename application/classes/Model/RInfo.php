<?php
/**
 * @author: dotkrnl
 * Date: 02/28/14
 * Time: 12:10 PM
 */

/**
 *
 * Class for Runtime Info notice
 *
 * Class Model_RInfo
 */
class Model_RInfo extends Model_Save
{
    static $cols = array(
        'solution_id',
        'error',
    );

    static $primary_key = 'solution_id';

    static $table = 'runtimeinfo';

    public $solution_id;
    public $error;

    /**
     * @param string $id
     *
     * @return Model_RInfo
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
