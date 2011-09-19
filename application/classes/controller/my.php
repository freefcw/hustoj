<?php defined('SYSPATH') or die('No direct script access.');

class Controller_My extends Controller {

	protected $view;

	public function before()
	{
		$this->view = View::factory('layout');
	}

	public function after()
	{
		$this->response->body($this->view);
	}

} // End Welcome
