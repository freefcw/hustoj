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

            $user = Model_User::authenticate($username, $this->hash($password));
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
   	 * @param   mixed    username
   	 * @return  boolean
   	 */
   	public function force_login($username)
   	{
   		// Complete the login
   		return $this->complete_login($username);
   	}

    public function is_admin()
    {
        if (Auth::instance()->get_user() === null) return false;
        $privilege = Session::instance()->get('privilege');
        if ($privilege == 'admin') return true;
        return false;
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