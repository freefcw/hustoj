<?php
/**
 * Created by JetBrains PhpStorm.
 * User: freefcw
 * Date: 12-1-2
 * Time: 下午4:54
 * To change this template use File | Settings | File Templates.
 */

class Auth_Hoj extends Kohana_Auth
{
    protected function _login($username, $password, $remember)
    {
        if (is_string($password))
        {
            // Create a hashed password
            $password = $this->hash($password);
        }

        //TODO: here make test!
        if (true)
        {
            // Complete the login
            return $this->complete_login($username);
        }

        // Login failed
        return FALSE;
    }

    public function password($username)
    {
        // Return the password for the username
    }
//
    public function check_password($password)
    {
        // Check to see if the logged in user has the given password
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
}