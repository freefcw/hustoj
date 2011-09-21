<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Problem extends Controller_My {

	public function action_list()
	{
		// initial
		$page_id = $this->request->param('id', 1);
		
		// db
		$problem = new Model_Problem();

		// view
		$body = View::factory('problem/list');
		$body->page_id = $page_id;

		$per_page = 50;

		$body->problemlist = $problem->get_page($page_id, $per_page);
		//TODO: add check permission of contest
		$total = $problem->get_total();
		if (!is_string($total)) var_dump($total);
		$body->pages = ceil(intval($total) / $per_page);

		$title = 'Problem Set '.$page_id;
		$this->view->title = $title;

		$this->view->body = $body;
	}

	public function action_show()
	{
		// initial
		$pid = $this->request->param('id');
		if ($pid == NULL) {
			$this->action_list();
		}

		// db
		$problem = new Model_Problem();

		// view
		$body = View::factory('problem/show');
		$body->p = $problem->get_problem($pid);

		$this->view->title = $body->p->title;
		$this->view->body = $body;
	}
	
	public function action_status()
	{
		// init
		$page = $this->request->param('id', 1);

		// db
		$db = new Model_Problem();
		$status = $db->get_status($page);
		$total = $db->get_total();

		// view
		$body = View::factory('problem/status');
		$body->list = $status;
		$body->page = $page;
		$body->total = $total;

		$this->view->title = 'status';
		$this->view->body = $body;
	}

	public function action_submit()
	{
		$body = View::factory('problem/submit');

		$this->view->title = 'Submit';
		$this->view->body = $body;
		
	}

	public function action_summary()
	{
		// init
		$pid = $this->request->param('id');
		if ($pid === NULL) {
			# TODO: redirect to back?
		}

		// db
		$p = new Model_Problem();
		$summary = $p->get_summary($pid);
		$best_solution = $p->get_best_solution($pid);

		// view

		$body = View::factory('problem/summary');
		$body->summary = $summary;
		$body->solutions = $best_solution;

		$this->view->title = "Summary of {$pid}";
		$this->view->body = $body;
	}

} // End Welcome
