<?php
/**
 * User: freefcw
 * Date: 12-1-2
 * Time: 下午4:54
 */

class Auth_Hoj extends Kohana_Auth
{
    protected function _login($username, $password, $remember)
    {
        if (is_string($password)) $password = $this->hash($password);

        $user = new Model_User();
        if ($user->auth($username, $password))
        {
            // Complete the login
            return $this->complete_login($username);
        }

        return FALSE;
    }

    public function password($username)
    {
        $user = new Model_User();
        return $user->get_password($username);
    }

    public function hash($pwd)
    {
        return md5($pwd);
    }

    public function check_password($password)
    {
        $username = $this->get_user();

        if ($username == null) return false;

        return ($this->hash($password) == $this->password($username));
    }
//
//    public function logged_in($role = NULL)
//    {
//        // Check to see if the user is logged in, and if $role is set, has all roles
//    }
//
//    public function get_user($default = NULL)
//    {
//        // Get the logged in user, or return the $default if a user is not found
//    }

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
}