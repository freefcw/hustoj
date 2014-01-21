<?php
/**
 * @author: freefcw
 * Date: 1/21/14
 * Time: 9:49 AM
 */

class Model_Option extends Model_Base
{
    static $primary_key = 'option_id';

    static $table = 'options';

    static $cols = array(
        'option_id',
        'name',
        'desc',
        'value',
    );

    public $option_id;
    public $name;
    public $desc;
    public $value;


    /**
     * @param $name
     *
     * @return mixed
     */
    public static function get_option($name)
    {
        $query = DB::select()->from(static::$table)
            ->where('name', '=', $name);

        $result = $query->as_object(get_called_class())->execute();
        $item = $result->current();
        if ( $item )
            return $item->value;
        return null;
    }


    /**
     * 获取所有的选项
     *
     * @return array
     */
    public static function all_options()
    {
        $query = DB::select()
                   ->from(static::$table);

        $result = $query->execute();

        return $result->as_array();
    }

    public function initial_data()
    {

    }

    public function validate()
    {}
}