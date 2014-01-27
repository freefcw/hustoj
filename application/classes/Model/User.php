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
        $user = self::find_by_id($username);
        if ( $user )
        {
            if ( self::is_old_password($user->password))
            {
                if ($user->password == md5($password))
                {
                    $user->log_login($password);
                    // update old password
                    $user->update_password($password);
                    $user->save();
                    return $user;
                }
                return false;
            }
            $origin_hash = base64_decode($user->password);
            $salt = substr($origin_hash, 20);
            $hash = Auth::instance()->hash($password, $salt);
            $user->log_login($hash);
            if ( $user->password == $hash ) return $user;
        }
        return false;
    }

    /**
     * record user login info
     *
     * @param string $login_passwd
     */
    public function log_login($login_passwd)
    {
        $record = new Model_Userlog;
        $record->user_id = $this->user_id;
        $record->password = $login_passwd;

        $record->save();
    }

    /**
     * 判断是否是老密码
     *
     * @param $str
     *
     * @return bool
     */
    protected static function is_old_password($str)
    {
        for ( $i = strlen($str) - 1; $i >= 0; $i-- )
        {
            $c = $str[$i];
            if ('0'<=$c && $c<='9') continue;
            if ('a'<=$c && $c<='f') continue;
            if ('A'<=$c && $c<='F') continue;
            return false;
        }
        return true;
    }

    /**
     *
     * this is new
     *
     * @param $username
     * @param $password
     *
     * @return mixed
     */
    protected static function auth($username, $password)
    {
        $query = DB::select()
                   ->from(self::$table)
                   ->where('user_id', '=', $username)
                   ->where('password', '=', $password)
                   ->as_object(get_called_class());

        $result = $query->execute();
        return $result->current();
    }

    /**
     *
     * @param     $filters
     * @param int $page
     * @param int $limit
     *
     * @return mixed
     */
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

    /**
     * update password
     *
     * @param $password
     */
    public function update_password($password)
    {
        $this->password = Auth_Hoj::instance()->hash($password);
    }

    /**
     * pass ratio
     *
     * @return string
     */
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
            $this->permission_list = Model_Privilege::permission_of_user($this->user_id);

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
     * disable user
     */
    public function disable()
    {
        if ( $this->is_disabled() ) return ;
        $this->defunct = self::DEFUNCT_YES;
        $this->save();
    }

    /**
     * 用户是否被disable的
     *
     * @return bool
     */
    public function is_disabled()
    {
        return $this->defunct == self::DEFUNCT_YES;
    }

    public function validate()
    {}

    protected function initial_data()
    {
        $now = OJ::format_time();

        $this->reg_time    = $now;
        $this->solved      = 0;
        $this->submit      = 0;
        $this->volume      = 1;
        $this->language    = 1;
        $this->accesstime  = $now;
        $this->ip          = Request::$client_ip;
        $this->defunct     = self::DEFUNCT_NO;
    }

    /**
     * is user resolved probelm
     *
     * @param $problem_id
     *
     * @return bool
     */
    public function is_problem_resolved($problem_id)
    {
        if ( ! $this->resolved_problem_list )
            $this->resolved_problem_list = Model_Solution::user_resolved($this->user_id);
        return in_array($problem_id, $this->resolved_problem_list);
    }

    /**
     * the problem id list for user resoled
     *
     * @return array
     */
    public function problems_resolved()
    {
        return Model_Solution::user_resolved($this->user_id);
    }

    /**
     * check user has permission view all code
     *
     * @return bool
     */
    public function can_view_code()
    {
        if ( $this->is_admin() OR $this->has_permission(Model_Privilege::PERM_SOURCEVIEW) )
            return true;
        return false;
    }

    /**
     * 保存当前实例到数据库
     *
     * @param $new_user
     *
     * @return int
     */
    public function save($new_user=false)
    {
        // prepare data
        //        $this->data['update_at'] = PP::format_time();

        // 过滤不存在的数据
        $data = $this->raw_array();

        if ( ! $new_user )
        {
            // if primary key exist, then update, contain primary key, haha
            $primary_id = $this->{static::$primary_key};
            //            unset($this->data[static::$primary_key]);

            $query = DB::update(static::$table)->set($data)->where(static::$primary_key, '=', $primary_id);
            $ret   = $query->execute();

            return $ret;
        } else
        {
            // else save new record
            $keys   = array_keys($data);
            $values = array_values($data);

            list($id, $affect_row) = DB::insert(static::$table, $keys)->values($values)->execute();

            $this->{static::$primary_key} = $id;

            return $affect_row;
        }
    }
}