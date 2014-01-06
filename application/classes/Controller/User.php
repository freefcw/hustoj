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
            $this->redirect(Route::url('default'));

        $this->template_data['title'] = "About {$uid}";
        $this->template_data['u'] = $user;
    }

    public function action_disable()
    {
        $this->check_admin();

        $uid = $this->request->param('id');
        $user = Model_User::find_by_id($uid);

        if ( $user )
        {
            $user->disable();
        }
        $this->redirect($this->request->referrer());
    }

    public function action_edit()
    {
        $user = $this->check_login();

        if ( $this->request->is_post() ) {
            $safe_data = $this->cleaned_post();

            // check user password
            if ( Auth::instance()->check_password($safe_data['password']) ) {
                // if change password
                unset($safe_data['password']);
                if (strlen($safe_data['newpassword']) > 6
                    AND ($safe_data['newpassword'] === $safe_data['confirm'])
                ) {
                    $user->password = Auth::instance()->hash($safe_data['newpassword']);
                } else {
                    $error = 'new password is less than 4 chars or not same';
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
        $this->template_data['title'] = 'User Register';
    }

    public function action_login()
    {
        if (Auth::instance()->get_user()) {
            $this->redirect(Route::url('default'));
        }
        if ( $this->request->is_post() ) {
            $username = $this->get_post('username');
            $password = $this->get_post('pwd');

            if ( Auth::instance()->login($username, $password, true) ) {

                // check user is valid
                $user = Auth::instance()->get_user();
                if ( $user->is_defunct() )
                {
                    Auth::instance()->logout();
                    return $this->redirect('/user/disabled');
                }

                // go back url
                $session = Session::instance();
                $url = $session->get_once('return_url');
                if ( ! $url ) $url = Route::url('default');
                $this->redirect($url);
            }

            $error = 'Username or password error, please try again.';
        }
        // view
        if (isset($error)) {
            $this->template_data['error'] = $error;
        }
        $this->template_data['title'] = 'Welcome';
        $this->template_data['username'] = $this->get_post('username');
    }
    public function action_new()
    {
        if ( $this->request->is_get() ) {
            $this->redirect(Route::url('default'));
        }

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

        $errors = array();
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
                $this->redirect(Route::url('default'));
            } else {
                array_push($errors, 'User Id is existed!');
            }

        }
        $this->template_data['title'] = "User Register";
        array_merge($errors, $post->errors());
        //TODO： add more error handle!
        $this->response->body(Debug::dump($errors));
    }

    public function action_logout()
    {
        Auth::instance()->logout();

        $this->redirect(Route::url('default'));
    }
}