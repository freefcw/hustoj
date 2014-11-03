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
        'locale',
        'theme',
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
    public $locale;
    public $theme;

    /* @var Model_Privilege[] $permission_list */
    protected $permission_list = null;
    protected $resolved_problem_list = null;
    protected $trying_problem_list = null;

    protected $_number_of_new_mail = null;

    /**
     * proxy to find_by_id
     *
     * @param $user_id
     * @return Model_User
     */
    public static function find_by_username($user_id)
    {
        return self::find_by_id($user_id);
    }

    public function set_locale($lang)
    {
        if ( $this->locale != $lang )
        {
            $this->locale = $lang;
            $this->save();
        }
    }
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

        if ($user and $user->check_password($password, true))
        {
            return $user;
        }

        return false;
    }

    /**
     * get time of last user submission
     *
     * @return mixed
     */
    public function get_last_submission()
    {
        $filter = array(
            'user_id' => $this->user_id
        );
        $order_by = array(
            'solution_id' => Model_Base::ORDER_DESC
        );
        $last =  Model_Solution::find($filter, 1, 1, $order_by);
        if ($last and $last[0]) {
            return $last[0]->in_date;
        } else {
            return false;
        }
    }

    /**
     * get last volume, user visited
     *
     * @param int $default
     *
     * @return mixed
     */
    public function get_last_volume( $default = 1)
    {
        if ( $this->volume > 0)
            return $this->volume;
        return $default;
    }

    public function number_of_solution_accept()
    {
        return Model_Solution::number_of_solution_accept_for_user($this->user_id);
    }

    public function number_of_solution_failed()
    {
        return Model_Solution::number_of_solution_failed_for_user($this->user_id);
    }

    public function number_of_solutions()
    {
        return Model_Solution::number_of_solution_total_for_user($this->user_id);
    }

    public function number_of_problem_accept()
    {
        return Model_Solution::number_of_problem_accept_for_user($this->user_id);
    }

    public function update_user_solution_stats()
    {
        $this->submit = $this->number_of_solutions();
        $this->solved = $this->number_of_problem_accept();
        $this->save();
    }

    public function have_new_mail()
    {
        return $this->number_of_new_mail() > 0;
    }

    public function number_of_new_mail()
    {
        if ( is_null($this->_number_of_new_mail) )
        {
            $this->_number_of_new_mail = Model_Mail::number_of_unread_mail_for_user($this->user_id);
        }
        return $this->_number_of_new_mail;
    }

    public function add_permission($permission)
    {
        $privilege = new Model_Privilege;
        $privilege->user_id = $this->user_id;
        $privilege->rightstr = $permission;
        $privilege->save();

        $this->permission_list = null;
    }

    public function set_permission($plist)
    {
        // clean all permission before
        $this->permission_list = null;
        Model_Privilege::clean_user_admin_permision($this->user_id);

        if ( ! is_array($plist)) return;

        foreach($plist as $permission)
        {
            $p = $this->has_permission($permission, true);
            if ( $p )
            {
                // if exist update the defunct status
                if ( $p->is_defunct() )
                {
                    $p->defunct = self::DEFUNCT_NO;
                    $p->save();
                }
            } else {
                // add new permission
                $this->add_permission($permission);
            }
        }
    }

    /**
     * record user login info into database
     *
     * @param string $user_id
     * @param string $password the password user try to login
     */
    public static function log_login($user_id, $password)
    {
        $record = new Model_Userlog;
        $record->user_id = $user_id;
        $record->password = $password;

        $record->save();
    }

    public function check_password($password, $log_to_database=false)
    {
        if ( self::is_old_password($this->password))
        {
            $hashed_password = md5($password);
            if ($this->password == $hashed_password)
            {
                if ( $log_to_database )
                {
                    $this->log_login($this->user_id, $hashed_password);
                }
                // update old password
                $this->update_password($password);
                $this->save();
                return true;
            }
            return false;
        }

        // new style password
        $origin_hash = base64_decode($this->password);
        $salt = substr($origin_hash, 20);

        $hashed_password = Auth::instance()->hash($password, $salt);

        if ( $log_to_database )
        {
            $this->log_login($this->user_id, $hashed_password);
        }

        return $this->password == $hashed_password;
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
     *
     * @param      $permission
     * @param bool $needit
     *
     * @return array|bool|Model_Privilege
     */
    public function has_permission($permission, $needit = false)
    {
        if ( ! $this->permission_list )
        {
            $this->permission_list = Model_Privilege::permission_of_user($this->user_id);
        }

        foreach($this->permission_list as $p)
        {
            if ( $p->rightstr == $permission )
            {
                if ( $needit ) return $p;
                if ( $p->is_defunct() ) return false;
                return true;
            }
        }
        return false;
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
    {
	    if ( ! in_array($this->locale, I18n::supported_lang()) )
	    {
		    $this->locale = I18n::default_language();
	    }
    }

    public function take_new_submit()
    {
        $this->submit = $this->submit + 1;
        $this->resolved_problem_list = null;
        $this->trying_problem_list = null;
        $this->save();
    }

    protected function initial_data()
    {
        $now = e::format_time();

        $this->reg_time    = $now;
        $this->solved      = 0;
        $this->submit      = 0;
        $this->volume      = 1;
        $this->language    = 1;
        $this->accesstime  = $now;
	    $this->locale      = I18n::default_language();
        $this->ip          = Request::$client_ip;
        $this->defunct     = self::DEFUNCT_NO;
    }

    /**
     * is user resolved problem
     *
     * @param $problem_id
     *
     * @return bool
     */
    public function is_problem_resolved($problem_id)
    {
        $resolved_problems = $this->problems_resolved();
        return in_array($problem_id, $resolved_problems);
    }

    public function is_problem_trying($problem_id)
    {
        $trying_problems = $this->problems_tried();
        return in_array($problem_id, $trying_problems);
    }

	/**
	 * the problem id list for user resoled
	 *
	 * @throws Kohana_Exception
	 * @return array
	 */
    public function problems_resolved()
    {
        if ( ! $this->resolved_problem_list )
        {
            $this->resolved_problem_list = Model_Solution::user_resolved_problem($this->user_id);
        }
        return $this->resolved_problem_list;
    }

    /**
     * the problem id list for user tried
     *
     * @return array
     */
    public function problems_tried()
    {
        if ( ! $this->trying_problem_list )
        {
            $all_tried = Model_Solution::user_tried_problem($this->user_id);
            $resolved_problem = $this->problems_resolved();
            $this->trying_problem_list = array_diff($all_tried, $resolved_problem);
        }
        return $this->trying_problem_list;
    }

    /**
     * check user has permission view all code
     *
     * @param Model_Solution|array $solution
     *
     * @return bool
     */
    public function can_view_code( $solution=null)
    {
        // use solution as array
        if ( $solution AND $solution['user_id'] == $this->user_id)
        {
            return true;
        }
        if ( $this->is_admin() OR $this->has_permission(Model_Privilege::PERM_SOURCEVIEW) )
            return true;
        return false;
    }

	/**
	 * 保存当前实例到数据库
	 *
	 * @param bool $new_user
	 *
	 * @throws Kohana_Exception
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
        } else {
            // else save new record
            $keys   = array_keys($data);
            $values = array_values($data);

            list($id, $affect_row) = DB::insert(static::$table, $keys)->values($values)->execute();

            $this->{static::$primary_key} = $id;

            return $affect_row;
        }
    }
}
