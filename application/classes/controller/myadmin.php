<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Myadmin extends Controller {

	protected $view;

	public function before()
	{
		$this->view = View::factory('admin/layout');

        // default is null

        $this->view->current_user = Auth::instance()->get_user();

		# TODO: add admin control

	}

	public function after()
	{
		$this->response->body($this->view);
	}

} // End Welcome
