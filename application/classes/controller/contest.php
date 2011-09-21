<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contest extends Controller_My {
	public function action_index()
	{
		// initial 
		$cid = $this->request->param('id', 1);

		// db
		$c = new Model_Contest();
		$contest_list = $c->get_list($cid);

		// view
		$body = View::factory('contest/list');
		$body->list = $contest_list;
		
		$this->view->title = "Contest List";
		$this->view->body = $body;
	}

	public function action_show()
	{}
}