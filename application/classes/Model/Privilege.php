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
            'defunct' => 'N',
        );
        $result = self::find($filter);
        $data = array();
        foreach($result as $item)
        {
            array_push($data, $item->rightstr);
        }
        return $data;
    }

    public static function member_of_contest($contest_id)
    {
        $filter = array(
            'rightstr' => 'c'.$contest_id,
            'defunct'  => 'N',
        );
        $result = array();
        foreach(Model_Privilege::find($filter) as $item)
        {
            array_push($result, $item->user_id);
        }
        return $result;
    }

    protected function initial_data()
    {
        $this->defunct = 'N';
    }

    public function validate()
    {}
}