<?php defined('SYSPATH') or die('No direct script access.');

class Controller_My extends Controller {

	protected $view;

	public function before()
	{
		$this->view = View::factory('layout');
		
		# TODO: add user control
		#Session::instance()->get('login')
		# TODO: add admin control
		$this->view->username = "";
		#$session = new Session();
		#if ($session.get())
	}

	public function after()
	{
		$this->response->body($this->view);
	}

} // End Welcome
