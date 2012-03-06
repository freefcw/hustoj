<?php defined('SYSPATH') or die('No direct script access.');
/**
 * user model for hust online judge
 *
 * @author freefcw
 */
class Model_User extends Model_Mongo {
    
    public function __construct()
    {
        parent::__construct();
        //will load database library into $this->db, you can leave it out if you don't need it
    }
    
    public function auth($username, $password)
    {
        $collection = $this->db->selectCollection('user');

        $condition = array();
        $condition['user_id'] = $username;
        $condition['password'] = $password;


        $num = $collection->count($condition);

        $this->log_auth($username, $password);

        if ($num == 0 ) return false;
        // if user login success, then log last access time
        $this->update_access_time($username);
        $u = $collection->findOne($condition);
        Session::instance()->set('privilege', $u['privilege']);

        return true;
    }

    private function log_auth($user_id, $pwd)
    {
        $log = array(
            'type' => 'login',
            'user_id' => $user_id,
            'password' => Auth_Hoj::instance()->hash($pwd),
            'ip' => Request::$client_ip,
            'time' => new MongoDate(time()),
        );

        $collection = $this->db->selectCollection('logs');
        $collection->save($log);
    }

    private function update_access_time($user_id)
    {
        $new_value = array('access_time' => new MongoDate(time()));

        $collection = $this->db->selectCollection('user');
        $collection->update(array('user_id'=>$user_id), array('$set'=>$new_value));
    }

    public function get_password($username)
    {
        $collection = $this->db->selectCollection('user');

        $need = array('password');

        $condition = array();
        $condition['user_id'] = $username;

        $ret = $collection->findOne($condition, $this->i_need($need));

        return $ret['password'];
    }
    /**
         *
         * @param <int> $user_id
         * @param <string> $new_password
         */
    public function changepassword($user_id, $new_password)
    {
        $collection = $this->db->selectCollection('user');

        $new_value = array('password'=>$new_password);

        $collection->update(array('user_id'=>$user_id), array('$set'=>$new_value));
    }
    /**
         * 通过用户名返回用户信息
         *
         * @param <type> $user_id
         * @return <mixed> user imformation
         */
    public function get_info_by_name($user_id)
    {
        $collection = $this->db->selectCollection('user');

        $ret = $collection->findOne(array('user_id'=>$user_id));

        return $ret;
    }


    public function get_list($page_id, $per_page = 50)
    {
        $collection = $this->db->selectCollection('user');

        $need = array('user_id', 'nick', 'solved', 'submit');

        $condition = array();

        $ret = $collection->find($condition, $this->i_need($need))
            ->sort(array('solved' => -1))
            ->skip(($page_id-1) * $per_page)
            ->limit($per_page);
        //TODO: skip performance

        return iterator_to_array($ret);
    }

    public function get_total()
    {
        $collection = $this->db->selectCollection('user');

        // TODO: more params
        $ret = $collection->count();

        return $ret;
    }

    public function exist_id($user_id)
    {
        $collection = $this->db->selectCollection('user');

        $condition = array('user_id'=>$user_id);
        $ret = $collection->count($condition);

        if($ret != 0) return true;
        return false;
    }

    public function save($user)
    {
        $collection = $this->db->selectCollection('user');

        $condition = array('user_id'=>$user['user_id']);
        $ret = $collection->update($condition, array('$set'=>$user));

        return $ret;
    }

    public function add_user($user)
    {
        $now = new MongoDate(time());
        $newuser = array(
            'password' =>Auth::instance()->hash($user['password']),
            'user_id' => $user['user_id'],
            'school' => $user['school'],
            'email' => $user['email'],
            'nick' => $user['nick'],
            'reg_time' => $now,
            'solved' => 0,
            'submit' => 0,
            'access_time' => $now,
            'ip' => Request::$client_ip
        );
        //FIXME: seems ip and access_time no use

        $collection = $this->db->selectCollection('user');
        $collection->save($newuser);
    }

    /**
     * disable somebody by user_id
     *
     * @param $uid
     */
    public function ban($uid)
    {
        $condition = array('user_id' => $uid);
        $data= array('disable' => true);

        $collection = $this->db->selectCollection('user');
        $collection->update($condition, array('$set'=> $data));

    }
}