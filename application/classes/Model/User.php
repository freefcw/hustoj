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

    /**
     * @param $username
     *
     * @return mixed
     */
    public function get_password($username)
    {
        $need = array('password');

        $condition = array();
        $condition['user_id'] = $username;

        $ret = $this->collection->findOne($condition, $this->i_need($need));

        return $ret['password'];
    }

    /**
     *
     * @param <int> $user_id
     * @param <string> $new_password
     */
    public function changepassword($user_id, $new_password)
    {
        $new_value = array('password' => $new_password);

        $this->collection->update(array('user_id' => $user_id), array('$set' => $new_value));
    }

    /**
     * 通过用户名返回用户信息
     *
     * @param $user_id
     *
     * @return array|null <mixed> user imformation
     */
    public function get_info_by_name($user_id)
    {
        $ret = $this->collection->findOne(array('user_id' => $user_id));

        return $ret;
    }


    /**
     *
     * get user list
     *
     * @param     $page_id
     * @param int $per_page
     *
     * @return array
     */
    public function get_list($page_id, $per_page = 50)
    {
        $need = array('user_id', 'nick', 'solved', 'submit');

        $condition = array();

        $ret = $this->collection->find($condition, $this->i_need($need))
            ->sort(array('solved' => -1))
            ->skip(($page_id - 1) * $per_page)
            ->limit($per_page);
        //TODO: skip performance

        return iterator_to_array($ret);
    }

    /**
     * get total user
     *
     * @return int
     */
    public function get_total()
    {
        // TODO: more params
        $ret = $this->collection->count();

        return $ret;
    }

    /**
     * if user exist
     *
     * @param $user_id
     *
     * @return bool
     */
    public function exist_id($user_id)
    {
        $condition = array('user_id' => $user_id);
        $ret = $this->collection->count($condition);

        if ($ret != 0) {
            return true;
        }
        return false;
    }


    /**
     * @param $user
     */
    public function add_user($user)
    {
        $now = new MongoDate(time());
        $newuser = array(
            'password'    => Auth::instance()->hash($user['password']),
            'user_id'     => $user['username'],
            'school'      => $user['school'],
            'email'       => $user['email'],
            'nick'        => $user['nick'],
            'reg_time'    => $now,
            'solved'      => 0,
            'submit'      => 0,
            'access_time' => $now,
            'ip'          => Request::$client_ip,
        );
        //FIXME: seems ip and access_time no use

        $this->collection->save($newuser);
    }

    /**
     * disable somebody by user_id
     *
     * @param $uid
     */
    public function ban($uid)
    {
        $condition = array('user_id' => $uid);
        $data = array('disable' => true);

        $this->collection->update($condition, array('$set' => $data));
    }

    public function validate()
    {}

    protected function initial_data()
    {}
}