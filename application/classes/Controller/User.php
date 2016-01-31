<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base
{

    public function action_list()
    {
        // initial
        $page = $this->request->param('id', 1);

        $orderby = array(
            'solved' => Model_Base::ORDER_DESC,
        );
        $filter = array();
        // user order by resolved problems
        $users = Model_User::find($filter, $page, OJ::per_page, $orderby);

        // views
        $total = Model_User::count($filter);
        $this->template_data['title'] = __('user.list.user_rank');
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

        $user->update_user_solution_stats();

        $this->template_data['title']
            = __('user.profile.about_:name', array(':name' => $uid));
        $this->template_data['user'] = $user;
    }

    public function action_disable()
    {
        $this->check_admin();

        $uid = $this->request->param('id');
        $user = Model_User::find_by_id($uid);
        if ( ! $user )
            throw new Exception_Page(__('common.user_not_found'));

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
                        $error = __('user.edit.error_too_short');
                    }
                    $user->password = Auth::instance()->hash($safe_data['newpassword']);
                }

                if ( !isset($error))
                {
                    $user->update($safe_data);
                    $user->save();
                    I18n::setup(); // locale setting may be updated
                    $this->flash_info(__('user.edit.edit_done'));
                }
            } else {
                $this->flash_error(__('user.edit.error_password'));
            }
        }

        $this->template_data['userinfo'] = $user;
        $this->template_data['title'] = __('user.edit.user_edit');
    }

    public function action_disabled()
    {
        //TODO: more detail
        $this->template_data['title'] = __('common.user_disabled_title');
    }

    public function action_register()
    {
        if ( $this->request->is_post() and $this->check_captcha() )
        {
            // TODO: cleaned_post() caused password 'fo<ob>ar' problem
            $post = Validation::factory($this->cleaned_post())
                              ->rule('username', 'not_empty')
                              ->rule('username', 'min_length', array(':value', 4))
                              ->rule('username', 'max_length', array(':value', 15))
                              ->rule('username', 'alpha_numeric')
                              ->rule('password', 'not_empty')
                              ->rule('password', 'min_length', array(':value', 6))
                              ->rule('password', 'matches', array(':validation', 'password', 'confirm'))
                              ->rule('school', 'max_length', array(':value', 30))
                              ->rule('email', 'not_empty')
                              ->rule('email', 'max_length', array(':value', 30))
                              ->rule('email', 'email');
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
                    $this->flash_error(array(__('common.user_exist')));
                }
            }
            $errors = $post->errors("User");
            $this->flash_error($errors);
        }

        $this->template_data['title'] = __('user.register.user_register');
    }

    public function action_login()
    {
        if ( $this->get_current_user() ) {
            $this->go_home();
        }
        $ss = Session::instance();

        if ( $this->request->is_post() ) {

            $login_times = $ss->get('login_times', 0);
            $ss->set('login_times', $login_times + 1);
            if ( $login_times > 1 )
            {
                if ( $this->check_captcha() )
                {
                    $this->do_login();
                }
            } else {
                $this->do_login();
            }

            $this->flash_error(__('common.login_error'));
            $this->redirect('user/login');
        }
        $this->template_data['title'] = __('user.login.user_login');
        $this->template_data['username'] = $this->get_post('username');
    }

    protected function do_login()
    {
        $username = $this->get_post('username');
        $password = $this->get_post('pwd');

        if ( Auth::instance()->login($username, $password, true) ) {
            // go back url
            $ss = Session::instance();
            $url = $ss->get_once('return_url');
            if ( ! $url )
            {
                $this->go_home();
            } else {
                $this->redirect($url);
            }
        }
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
            if (is_local_request()) {
                return true;
            }

            $this->flash_error($resp->error);
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
            $this->flash_error(__('common.captcha_error'));
            return false;
        }
        return true;
    }

    public function action_logout()
    {
        Auth::instance()->logout();

        $this->go_home();
    }

    private function is_local_request() {
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
            $request_remote_addr = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $request_remote_addr = $_SERVER['REMOTE_ADDR'];
        }
        return $request_remote_addr == '127.0.0.1' ||
                $request_remote_addr == '::1' ||
                $request_remote_addr == '0:0:0:0:0:0:0:1' ||
                $request_remote_addr == 'localhost';
    }
}
