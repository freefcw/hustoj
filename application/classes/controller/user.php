<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_My
{

    public function action_list()
    {
        // initial
        $page = $this->request->param('id', 1);

        // db
        $per_page = 50;
        $db = new Model_User();
        $users = $db->get_list($page, $per_page);

        // views
        $body = View::factory('user/list');
        $body->users = $users;
        $body->page = $page;
        $body->total = $db->get_total();
        $body->total_page = ceil($db->get_total() / $per_page);
        $body->per_page = $per_page;

        $this->view->title = "User List";
        $this->view->body = $body;
    }

    public function action_profile()
    {
        // init
        $uid = $this->request->param('id');

        //db
        $u = New Model_User();
        $user = $u->get_info_by_name($uid);

        //view

        $body = View::factory('user/profile');
        $body->u = $user;

        $this->view->title = "About {$uid}";
        $this->view->body = $body;
    }

    public function action_register()
    {
        $body = View::factory('user/register');

        $this->view->title = 'User Register';
        $this->view->body = $body;
    }

    public function action_login()
    {
        $request = $this->request;
        if (Auth::instance()->get_user()) {
            $request->redirect('/home');
        }
        if ($this->request->method() == 'POST') {
            $username = $request->post('username');
            $password = $request->post('pwd');

            if (Auth::instance()->login($username, $password, true)) {
                $session = Session::instance();
                $request->redirect($session->get_once('return_url'));
            }

            $error = 'Username or password error, please try again.';
        }
        // view
        $body = View::factory('user/login');
        if (isset($error)) {
            $body->error = $error;
        }

        $body->username = $request->post('username');

        $this->view->title = 'Welcome';

        $this->view->body = $body;
    }

    public function action_new()
    {
    }

    public function action_logout()
    {
        $session = Session::instance();
        $session->delete('loginok');
        Auth::instance()->logout();

        $this->request->redirect('/home');

        //TODO: show a logout page
        $body = View('user/logout');
        $body->msg = 'Logout Ok';

        $this->view->title = "logout";
        $this->view->body = $body;
    }
}