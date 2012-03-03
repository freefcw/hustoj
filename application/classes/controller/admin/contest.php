<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:24
 */

class Controller_Admin_Contest extends Controller_Admin_My{
    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
		// initial
		$page_id = $this->request->param('id', 1);

		// db
		$c = new Model_Contest();
		$contest_list = $c->get_list($page_id);

		// view
		$body = View::factory('admin/contest/list');
		$body->list = $contest_list;

        $this->view->title = 'Contest List';
        $this->view->body = $body;
    }
}