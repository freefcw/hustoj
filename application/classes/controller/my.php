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

    /**
     * @param string $msg
     * @param string $page
     */
    public function error_page($msg = '', $page = 'error')
    {
        $body = View::factory("admin/index/{$page}");
        $body->msg = $msg;

        $this->view->body = $body;
    }

    /**
     * @param string $redirect
     */
    public function check_login($redirect = '')
    {
        if (Auth::instance()->get_user()) {
            return;
        } else {
            $session = Session::instance();
            $session->set('return_url', $this->request->uri());
            $this->request->redirect('/login');
        }
    }

    public function after()
    {
        $this->response->body($this->view);
    }

} // End Welcome
