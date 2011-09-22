<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contest extends Controller_My {
	public function action_index()
	{
		// initial 
		$page_id = $this->request->param('id', 1);

		// db
		$c = new Model_Contest();
		$contest_list = $c->get_list($page_id);

		// view
		$body = View::factory('contest/list');
		$body->list = $contest_list;
		
		$this->view->title = "Contest List";
		$this->view->body = $body;
	}

	public function action_show()
	{
		// init
		$cid = $this->request->param('id', 1);

		// db
		$c = new Model_Contest();
		$problems = $c->get_contest_problems($cid);
		$contest = $c->get_contest($cid);

		// view
		$body = View::factory('contest/show');
		$body->contest = $contest;
		$body->problems = $problems;

		$this->view->title = "Contest - {$contest->title}";
		$this->view->body = $body;
	}
}