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

    protected static $local_cache = null;
    protected static $config_defaults = null;

    public function __construct($db=null)
    {
        parent::__construct($db);
    }

    public static function defaults()
    {
        if ( is_null(self::$config_defaults) )
        {
            self::$config_defaults = Kohana::$config->load('base')->as_array();
        }
        return self::$config_defaults;
    }

	/**
	 * @param      $name
	 *
	 * @param null $default
	 *
	 * @throws Kohana_Exception
	 * @return mixed
	 */
    public static function get_option($name, $default=null)
    {
        $options = self::all_options();

        foreach( $options as $option)
        {
            if ( $option->name == $name)
                return $option->value;
        }

        $defaults = self::defaults();
        if ( array_key_exists($name, $defaults) )
        {
            return $defaults[$name];
        }

        return $default;
    }


	/**
	 * 获取所有的选项
	 *
	 * @throws Kohana_Exception
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