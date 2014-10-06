<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 8:50 PM
 */

class Model_Privilege extends Model_Save
{
    static $table = 'privilege';
    static $primary_key = 'user_id';

    const PERM_ADMIN = 'administrator';
    const PERM_SOURCEVIEW = 'source_browser';

    static $cols = array(
        'user_id',
        'rightstr',
        'defunct',
    );

    public $user_id;
    public $rightstr;
    public $defunct;

    public static function permission_of_user($user_id)
    {
        $filter = array(
            'user_id' => $user_id,
        );
        $result = self::find($filter, 0, 0);
        return $result;
    }

    public static function permission_list()
    {
        $cls = new ReflectionClass(get_called_class());
        $constants = $cls->getConstants();
        $permission_list = array();
        foreach($constants as $key => $value)
        {
            if ( strpos($key, 'PERM') === 0 )
                array_push($permission_list, $value);
        }
        return $permission_list;
    }

    public static function clean_user_admin_permision($user_id)
    {
        $query = DB::delete(static::$table);
        $query->where('user_id', '=', $user_id)
            ->and_where('rightstr', 'IN', self::permission_list());

        return $query->execute();
    }

    /**
     * @param $contest_id
     *
     * @return array
     */
    public static function member_of_contest($contest_id)
    {
        $filter = array(
            'rightstr' => 'c'.$contest_id,
            'defunct'  => self::DEFUNCT_NO,
        );
        $result = array();
        foreach(Model_Privilege::find($filter, 0, 0) as $item)
        {
            array_push($result, $item->user_id);
        }
        return $result;
    }

    protected function initial_data()
    {
        $this->defunct = self::DEFUNCT_NO;
    }

    /**
     * 删除当前数据，只针对实例
     *
     * @return int
     */
    public function destroy()
    {
        $query = DB::delete(static::$table)
            ->where('user_id', '=', $this->user_id)
            ->and_where('rightstr', '=', $this->rightstr);
        
        return $query->execute();
    }

        public function validate()
    {}
}