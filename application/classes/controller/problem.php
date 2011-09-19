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
		$this->view->set('title', 'status');
	}

} // End Welcome
