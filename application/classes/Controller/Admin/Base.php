<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Base extends Controller {

	protected $view;

	public function before()
	{
		$this->view = View::factory('admin/layout');
        // default is null

        $this->view->current_user = Auth::instance()->get_user();
        if (!Auth::instance()->is_admin())
            $this->redirect(Route::url('default'));
	}

    public function error_page()
    {
        $this->redirect(Route::url('default'));
        // TODO: add more handle err
    }

	public function after()
	{
		$this->response->body($this->view);
	}

} // End Welcome
