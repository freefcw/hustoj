<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:04
 */

class Controller_Admin_Problem extends Controller_Admin_My {

    public function action_index()
    {
        $this->view->title = 'Problem List';
        $this->view->body = 'hello, problem';
    }
}