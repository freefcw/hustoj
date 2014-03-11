<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Base extends Controller_Base {
    /**
     * @var Model_User
     */
    protected $current_user = NULL;

	public function before()
	{
        parent::before();

        $this->current_user = $this->check_admin();
	}

    /**
     * 初始化controller
     */
    protected function init()
    {
        $this->view = 'admin/'.strtolower($this->request->controller()). '/'. $this->request->action();
    }

    /**
     * all post data
     *
     * @return array
     */
    protected function cleaned_post()
    {
        return $this->request->post();
        // trust admin
    }
} // End Welcome
