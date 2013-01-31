<?php defined('SYSPATH') or die('No direct script access.');

class Controller_My extends Controller
{

    protected $view;

    public function before()
    {
        $this->view = View::factory('layout');

        // default is null

        $this->view->current_user = Auth::instance()->get_user();

        # TODO: add admin control

    }

    public function error_page($msg = '', $page = 'error')
    {
        $body = View::factory("admin/index/{$page}");
        $body->msg = $msg;

        $this->view->body = $body;
    }

    public function need_login($redirect = '')
    {
        if (Auth::instance()->get_user()) {
            return;
        } else {
            $this->request->redirect('/login');
        }
    }

    public function after()
    {
        $this->response->body($this->view);
    }

} // End Welcome
