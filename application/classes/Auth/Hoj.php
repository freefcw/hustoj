<?php
/**
 * User: freefcw
 * Date: 12-1-2
 * Time: 下午4:54
 */

class Auth_Hoj extends Kohana_Auth
{

    public $current_user = NULL;

    protected function _login($user, $password, $remember)
    {
        if (! is_object($user)) {
            $username = $user;

            $user = Model_User::authenticate($username, $password);
            if ( $user )
            {
                return $this->complete_login($user);
            }
            return FALSE;
        }
        if ( $user )
            return TRUE;

        return FALSE;
    }

    public function password($user)
    {
        if ( ! is_object($user))
        {
            $user = Model_User::find_by_username($user);
        }
        return $user->password;
    }

    public function hash($str, $salt = null)
    {
        if ( ! $salt)
        {
            $salt = sha1(rand());
            $salt = substr($salt, 0, 4);
        }
        return base64_encode( sha1(md5($str) . $salt, true) . $salt );
    }


    /**
     * cause here can't detect password use origin password, so no use here.
     * just proxy to Model_User->check_password.
     *
     * @param $password
     * @return bool
     */
    public function check_password($password)
    {
        /* @var Model_User $user */
        $user = $this->get_user();

        if ( ! $user)
            return false;

        return $user->check_password($password);
    }

    public function logged_in($role = null)
    {
        $user = $this->get_user();
        if ( ! $user)
            return FALSE;
        return TRUE;
    }

    /**
   	 * Forces a user to be logged in, without specifying a password.
   	 *
   	 * @param   mixed   $username
   	 * @return  boolean
   	 */
   	public function force_login($username)
   	{
   		// Complete the login
   		return $this->complete_login($username);
   	}

    /**
     * @param Model_User $user
     *
     * @return bool
     */
    public function complete_login($user)
    {

        if ( $user )
        {
            $user->accesstime = date('Y-m-d H:i:s');
            $user->ip = Request::$client_ip;
            $user->save();
        }
        return parent::complete_login($user);
    }

    /**
     * @param null $default
     *
     * @return mixed|Model_User
     */
    public function get_user($default = NULL)
    {
        if ( ! $this->current_user )
        {
            $user = parent::get_user($default = NULL);
            if ( $user )
            {
                $this->current_user = Model_User::find_by_username($user->user_id);
            }
        }

        return $this->current_user;
    }
}