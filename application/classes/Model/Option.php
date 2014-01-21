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

    static $local_cache = null;

    /**
     * @param $name
     *
     * @return mixed
     */
    public static function get_option($name)
    {
        $options = self::all_options();
        foreach($options as $option)
        {
            if ( $option->name == $name )
                return $option->value;
        }
        return null;
    }


    /**
     * 获取所有的选项
     *
     * @return Model_Option[]
     */
    public static function all_options()
    {
        if ( is_null(self::$local_cache))
        {
            $query = DB::select()
                       ->from(static::$table);
            $result = $query->as_object(get_called_class())->execute();
            self::$local_cache = $result->as_array();
        }

        return self::$local_cache;
    }

    public function initial_data()
    {

    }

    public function save()
    {
        parent::save();
        self::$local_cache = null;
    }

    public function validate()
    {}
}