<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_My {

	public function action_ranklist()
	{
		
		// initial
		$page = $this->request->param('id', 1);

		// db
		$per_page = 50;
		$u = new Model_User();
		$users = $u->get_ranklist($page, $per_page);

		// views
		$body = View::factory('user/ranklist');
		$body->users = $users;
		$body->pages = $page - 1;
		$body->per_page = $per_page;
		
		$this->view->title = "Ranklist";
		$this->view->body = $body;
	}
	
	public function action_info()
	{
		$uid = $this->request->param('id');
		if ($uid == NULL) $this->action_login();


	}

	public function action_modify()
	{}

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