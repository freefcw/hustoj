<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Discuss extends Controller_My {
	
	public function action_index()
	{
		$this->page();
	}

	public function action_problem()
	{
		// init
		$pid = $this->request->param('id');
		if ($pid == NULL) {
			$this->index();
		}

		$body = View::factory('discuss/template');
		$this->view->title = 'Discuss';
		$this->view->body = $body;
	}

	public function action_page()
	{
		$this->request->param('id', 1);

		$body = View::factory('discuss/template');
		$this->view->title = 'Discuss';
		$this->view->body = $body;
	}
}