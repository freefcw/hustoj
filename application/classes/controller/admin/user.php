<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_My{

    public function action_index()
    {
        $this->view->title = 'User List';
        $this->view->body  = '';
    }
}
