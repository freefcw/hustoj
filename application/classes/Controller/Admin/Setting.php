<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Admin_Setting extends Controller_Admin_Base{

    public function action_index()
    {
        $this->template_data['title'] = 'General Setting';
    }

    public function action_system(){}

    public function action_discuss(){}

}