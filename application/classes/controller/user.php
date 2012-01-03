<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_My {

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
		$user = $u->get_user_by_name($uid);

		//view

		$body = View::factory('user/profile');
		$body->u = $user;

		$this->view->title = "About {$uid}";
		$this->view->body = $body;
	}

	public function action_register()
	{
		$body = View::factory('user/register');
		$this->view->body = $body;
	}

    public function action_signin()
    {
        // if not POST, then redirect to login page
        if ($this->request->method() == 'GET') {
            $this->request->redirect('/login');
        }

        $request = $this->request;
        $username = $request->post('username');
        $password = $request->post('pwd');

        $loginok = Auth::instance()->login($username, $password, true);

        if ($loginok) {
            $request->redirect('/home');
        } else {
            $body = View::factory('user/login');

            $body->error = "username or password error";

            $body->post = array('username' => $username);
            $this->view->title = 'Sign In';

            $this->view->body = $body;
        }
    }

	public function action_login()
	{
        if ($this->view->current_user != null) {
            $this->request->redirect('/home');
        }
        // view
      	$body = View::factory('user/login');

		$body->post = array('username' => Cookie::get('username', ''));

		$this->view->title = 'Welcome';

		$this->view->body = $body;
	}

	public function action_new()
	{}

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