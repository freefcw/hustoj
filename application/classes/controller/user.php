<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_My {

	public function action_list()
	{
		
		// initial
		$page = $this->request->param('id', 1);

		// db
		$per_page = 50;
		$u = new Model_User();
		$users = $u->get_list($page, $per_page);

		// views
		$body = View::factory('user/list');
		$body->users = $users;
		$body->pages = $page - 1;
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

	public function action_modify()
	{
		if ($uid == NULL) $this->action_login();
	}

	public function action_register()
	{
		$body = View::factory('user/register');
		$this->view->body = $body;
	}

	public function action_login()
	{
		// view
		$body = View::factory('user/login');
		$body->username = Cookie::get('uname', '');
		$body->errors = array();
		$body->post = array('username' => '');

		$this->view->title = 'Welcome Back';

		$this->view->body = $body;
	}

	public function action_new()
	{}

	public function action_logout()
	{
		$session = Session::instance();
		$session->delete('loginok');

		$body = View('user/logout');
		$body->msg = 'Logout Ok';

		$this->view->title = "logout";
		$this->view->body = $body;
	}
}