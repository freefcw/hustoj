<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Myadmin{

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

    public function action_problemlist()
    {
        $this->view->title = 'Problem List';
        $this->view->body = 'this is problem list';
    }

    public function action_userlist()
    {}
}