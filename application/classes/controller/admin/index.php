<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Index extends Controller_Admin_My{

    public function before()
    {
        parent::before();
        if (!Auth::instance()->is_admin()) $this->request->redirect('/');
    }

    public function action_index()
    {
        $this->view->title = 'Admin Control Panel';
        $this->view->body = 'hi, admin';
    }
}