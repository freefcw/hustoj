<?php defined('SYSPATH') or die('No direct script access.');
/**
 * user model for hust online judge
 *
 * @author freefcw
 */
class Model_User extends Model_Base
{
    static $cols = array(
        'user_id',
        'email',
        'submit',
        'solved',
        'defunct',
        'ip',
        'accesstime',
        'volume',
        'language',
        'password',
        'reg_time',
        'nick',
        'school',
    );

    static $primary_key = 'user_id';

    static $table = 'users';

    public $user_id;
    public $email;
    public $submit;
    public $solved;
    public $defunct;
    public $ip;
    public $accesstime;
    public $volume;
    public $language;
    public $password;
    public $reg_time;
    public $nick;
    public $school;

    protected $permission_list = null;
    protected $resolved_problem_list = null;


    /**
     * 判断用户登录信息是否正确
     *
     * @param string $username
     * @param string $password
     *
     * @return Model_User
     */
    public static function authenticate($username, $password)
    {
        $query = DB::select()
                   ->from(self::$table)
                   ->where('user_id', '=', $username)
                   ->where('password', '=', $password)
                   ->as_object(get_called_class());

        $result = $query->execute();
        return $result->current();
    }

    public static function find_by_solved($filters, $page = 1, $limit = 50)
    {
        $query = DB::select()->from(static::$table);
        foreach($filters as $col => $value)
        {
            $query->where($col, '=', $value);
        }
        if ( $limit ) $query->limit($limit);
        if ( $page ) $query->offset( $limit * ($page - 1));

        $query->order_by('solved',  'DESC');

        $result = $query->as_object(get_called_class())->execute();

        return $result->as_array();
    }

    public function update_password($password)
    {
        $this->password = Auth_Hoj::instance()->hash($password);
    }

    public function ratio_of_accept()
    {
        if ($this->submit != 0) return sprintf( "%.02lf%%", $this->solved / $this->submit * 100);
        return '0.00%';
    }

    /**
     * 判断用户是否有某项权限
     * @param $permission
     *
     * @return array|bool
     */
    public function has_permission($permission)
    {
        if ( ! $this->permission_list )
            return $this->permission_list = Model_Privilege::permission_of_user($this->user_id);
        return in_array($permission, $this->permission_list);
    }

    /**
     * 判断用户是否是管理员
     *
     * @return array|bool
     */
    public function is_admin()
    {
        return $this->has_permission(Model_Privilege::PERM_ADMIN);
    }

    /**
     * disable people
     */
    public function disable()
    {
    }

    public function validate()
    {}

    protected function initial_data()
    {
        $now = time();

        $this->reg_time    = $now;
        $this->solved      = 0;
        $this->submit      = 0;
        $this->accesstime  = $now;
        $this->ip          = Request::$client_ip;
    }

    /**
     * is user resolved probelm
     *
     * @param $problem_id
     *
     * @return bool
     */
    public function resolved_problem($problem_id)
    {
        if ( ! $this->resolved_problem_list )
            $this->resolved_problem_list = Model_Solution::user_resolved($this->user_id);
        return in_array($problem_id, $this->resolved_problem_list);
    }
}