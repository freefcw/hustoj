<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Base extends Controller_Base {
    protected $layout = 'admin/layout';

	public function before()
	{
        parent::before();

        if ( !Auth::instance()->is_admin() )
            $this->redirect(Route::url('default'));
	}

    /**
     * 初始化controller
     */
    protected function init()
    {
        $this->view = 'admin/'.strtolower($this->request->controller()). '/'. $this->request->action();
        $this->view_vars = array();
    }

} // End Welcome
