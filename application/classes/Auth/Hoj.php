<?php
/**
 * User: freefcw
 * Date: 12-1-2
 * Time: 下午4:54
 */

class Auth_Hoj extends Kohana_Auth
{
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


    public function check_password($password)
    {
        $user = $this->get_user();

        if ( ! $user)
            return false;
        return ($this->hash($password) === $user->password);
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
}