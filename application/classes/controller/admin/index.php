<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Index extends Controller_Admin_My{

    public function before()
    {
        parent::before();
        if (!Auth::instance()->is_admin()) $this->request->redirect('/');
    }

    public function action_index()
    {
        $body = View::factory('admin/index/dashboard');

        $this->view->title = 'Admin Control Panel';
        $this->view->body = $body;
    }

    public function action_rejudge()
    {
        if ($this->request->method() == 'POST') {
            $type = $this->request->post('type');
            $id = intval($this->request->post('typeid'));

            $m = new Model_Submission();
            if ($type == 'pid') {
                $m->rejudge_problem($id);
            } else if ($type == 'rid') {
                $m->rejudge_solution($id);
            }
        }
        $this->request->redirect('/admin/');
    }

}