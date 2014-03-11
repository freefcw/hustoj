<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base
{

    public function action_list()
    {
        // initial
        $page = $this->request->param('id', 1);

        $filter = array();
        $users = Model_User::find_by_solved($filter, $page, OJ::per_page);

        // views
        $total = Model_User::count($filter);
        $this->template_data['title'] = "User Rank";
        $this->template_data['users'] = $users;
        $this->template_data['page'] = $page;
        $this->template_data['total'] = $total;
        $this->template_data['total_page'] = ceil($total / OJ::per_page);
        $this->template_data['per_page'] = OJ::per_page;
    }

    public function action_profile()
    {
        // init
        $uid = $this->request->param('uid');

        $user = Model_User::find_by_id($uid);

        if ( ! $user )
            $this->go_home();

        $this->template_data['title'] = "About {$uid}";
        $this->template_data['user'] = $user;
    }

    public function action_disable()
    {
        $this->check_admin();

        $uid = $this->request->param('id');
        $user = Model_User::find_by_id($uid);
        if ( ! $user )
            throw new Exception_Base('User not found!');

        $user->disable();

        $this->redirect($this->request->referrer());
    }

    public function action_edit()
    {
        $user = $this->check_login();

        if ( $this->request->is_post() ) {
            $safe_data = $this->cleaned_post();

            // check user password
            if ( $user->check_password($safe_data['password']) ) {
                // if change password
                unset($safe_data['password']);
                if ($safe_data['newpassword'] AND ($safe_data['newpassword'] === $safe_data['confirm']) )
                {
                    if ( strlen($safe_data['newpassword']) < 6)
                    {
                        $error = 'new password is less than 4 chars or not same';
                    }
                    $user->password = Auth::instance()->hash($safe_data['newpassword']);
                }

                if ( !isset($error))
                {
                    $user->update($safe_data);
                    $user->save();
                    $tip = 'Update Success';
                }
            } else {
                $error = 'Password Wrong';
            }
        }

        $this->template_data['userinfo'] = $user;
        $this->template_data['error'] = isset($error) ? $error : null;
        $this->template_data['tip'] = isset($tip) ? $tip : null;

        $this->template_data['title'] = "Update Imformation";
    }

    public function action_disabled()
    {
        //TODO: more detail
        $this->template_data['title'] = 'ACCOUNT DISABLED';
    }

    public function action_register()
    {
        if ( $this->request->is_post() and $this->check_captcha() )
        {
            $post = Validation::factory($this->cleaned_post())
                              ->rule('username', 'not_empty')
                              ->rule('username', 'min_length', array(':value', 4))
                              ->rule('username', 'max_length', array(':value', 15))
                              ->rule('username', 'alpha_numeric')
                //->rule('username', 'User_Model::unique_username')
                              ->rule('password', 'min_length', array(':value', 6))
                              ->rule('password', 'matches', array(':validation', 'password', 'confirm'))
                              ->rule('school', 'max_length', array(':value', 30))
                              ->rule('email', 'max_length', array(':value', 30))
                              ->rule('email', 'email');
            $errors = $post->errors();
            if ($post->check()) {
                $user = Model_User::find_by_id($post['username']);
                if ( ! $user )
                {
                    $user = new Model_User;
                    $user->update($post->data());
                    $user->user_id = $post['username'];
                    $user->update_password($post['password']);
                    $user->save(true);

                    Auth::instance()->login($post['username'], $post['password'], true);
                    $this->go_home();
                } else {
                    array_push($errors, 'User Id is existed!');
                }
                array_merge($errors, $post->errors());
                $this->template_data['errors'] = $errors;
                $this->flash_message($errors);
            }
        }

        $this->template_data['title'] = "User Register";
    }

    public function action_login()
    {
        if (Auth::instance()->get_user()) {
            $this->go_home();
        }
        if ( $this->request->is_post() and $this->check_captcha() ) {
            $username = $this->get_post('username');
            $password = $this->get_post('pwd');

            if ( Auth::instance()->login($username, $password, true) ) {
                // check user is valid
                $user = Auth::instance()->get_user();
                if ( $user->is_defunct() )
                {
                    Auth::instance()->logout();
                    $this->redirect('/user/disabled');
                    return;
                }

                // go back url
                $session = Session::instance();
                $url = $session->get_once('return_url');
                if ( ! $url )
                {
                    $this->go_home();
                } else {
                    $this->redirect($url);
                }
            }

            $this->flash_message('Username or password error, please try again.');
        }

        $this->template_data['title'] = 'Welcome';
        $this->template_data['username'] = $this->get_post('username');
    }


    protected function check_captcha()
    {
        $captcha_mode = Model_Option::get_option('captcha_mode', false);

        if ( $captcha_mode == false ) return true;

        if ( $captcha_mode == 'recaptcha' )
        {
            $private_key = Model_Option::get_option('captcha_private_key', false);
            $path = Kohana::find_file('vendor', 'recaptcha-php-1.11/recaptchalib');
            require_once $path;

            $challenge = Arr::get($_POST, 'recaptcha_challenge_field');
            $response = Arr::get($_POST, 'recaptcha_response_field');

            $resp = recaptcha_check_answer($private_key, $_SERVER["REMOTE_ADDR"], $challenge, $response);

            if ( $resp->is_valid ) {
                return true;
            }
            $this->flash_message($resp->error);
            return false;
        }
        if ( $captcha_mode == 'local')
        {
            $challenge = Arr::get($_POST, 'code', false);
            $code = Session::instance()->get('captcha');

            if ( strtolower($code) == strtolower($challenge) )
            {
                return true;
            }
            $this->flash_message('Error Captcha Code');
            return false;
        }
        return true;
    }

    public function action_logout()
    {
        Auth::instance()->logout();

        $this->go_home();
    }
}