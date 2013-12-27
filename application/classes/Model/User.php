<?php defined('SYSPATH') or die('No direct script access.');
/**
 * user model for hust online judge
 *
 * @author freefcw
 */
class Model_User extends Model_Mongo
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        //will load database library into $this->db, you can leave it out if you don't need it
        $this->collection = $this->db->selectCollection('user');
    }

    /**
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public function auth($username, $password)
    {
        $condition = array();
        $condition['user_id'] = $username;
        $condition['password'] = $password;


        $num = $this->collection->count($condition);

        $this->log_auth($username, $password);

        if ($num == 0) {
            return false;
        }
        // if user login success, then log last access time
        $this->update_access_time($username);
        $u = $this->collection->findOne($condition);
        if (array_key_exists('privilege', $u)) {
            Session::instance()->set('privilege', $u['privilege']);
        } else // default permission is insert on user create or here? new user should has the default permission...
        {
            Session::instance()->set('privilege', 'user');
        }

        return true;
    }

    /**
     * @param $user_id
     * @param $pwd
     */
    private function log_auth($user_id, $pwd)
    {
        $log = array(
            'type'     => 'login',
            'user_id'  => $user_id,
            'password' => Auth_Hoj::instance()->hash($pwd),
            'ip'       => Request::$client_ip,
            'time'     => new MongoDate(time()),
        );

        $log_collection = $this->db->selectCollection('logs');
        $log_collection->save($log);
    }

    /**
     * @param $user_id
     */
    private function update_access_time($user_id)
    {
        $new_value = array('access_time' => new MongoDate(time()));

        $collection = $this->db->selectCollection('user');
        $collection->update(array('user_id' => $user_id), array('$set' => $new_value));
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
     *
     * @return bool
     */
    public function save($user)
    {
        $condition = array('user_id' => $user['user_id']);
        $ret = $this->collection->update($condition, array('$set' => $user));

        return $ret;
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
}