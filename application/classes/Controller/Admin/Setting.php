<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Admin_Setting extends Controller_Admin_Base{

    public function action_index()
    {
        $body = View::factory('admin/setting/index');

        $this->view->title = 'General Setting';
        $this->view->body = $body;
    }

    public function action_system(){}

    public function action_discuss(){}

}