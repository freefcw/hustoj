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
		//if (!is_string($total)) var_dump($total);
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

		$this->view->title = $body->p['title'];
		$this->view->body = $body;
	}
	
	public function action_status()
	{
		// init
		$page = $this->request->param('id', 1);
		$pid = $this->request->query('pid', null);
		$uid = $this->request->query('uid', null);
        $cid = $this->request->query('cid', null);
		$language = $this->request->query('language', null);
		$result = $this->request->query('result', null);
		
		$per_page = 20;
		
		// validation
		$validation = Validation::factory(array(
			'pid' => $pid,
			'uid' => $uid,
			'language' => $language,
			'result' => $result
			));
		$validation->rule('pid', 'numeric')
			->rule('uid', 'regex', array(':value', '/^\w+$/'))
			->rule('language', 'numeric')
			->rule('result', 'numeric')
            ->rule('cid', 'numeric');
			
		if($validation->check())
		{
			// TODO: add more handler
		} else {
			echo "error";
		}

		// db
		$db = new Model_Submisiion();
		$status = $db->get_status($page, $pid, $uid, $cid, $language, $result);
		$total = $db->get_status_count($pid, $uid, $cid, $language, $result);

		// view
		$body = View::factory('problem/status');
		$body->list = $status;
		$body->page = $page;
		$body->total = ceil($total / $per_page);
		$body->pid = $pid;
		$body->uid = $uid;
        $body->cid = $cid;
		$body->language = $language;
		$body->result = $result;

		$this->view->title = 'STATUS';
		$this->view->body = $body;
	}

	public function action_submit()
	{
        $request = $this->request;
		$pid = $request->param('id', '');

        if ($request->method() == 'GET')
        {
            $body = View::factory('problem/submit');
            $body->pid = $pid;
            $cid = $request->query('cid', null);
            $cpid = $request->query('pid', null);
            if ($cid !== null)
            {
                $body->cid = $cid;
                $body->cpid = $cpid;
            }

            $this->view->title = 'Submit';
            $this->view->body = $body;
            return ;
        }

        if ($request->method() == 'POST')
        {
            $post = $request->post();

            if (Auth::instance()->get_user() == null)
            {
                $error = 'You Should Login To Submit !';
                //TODO: validation
                if (!Auth::instance()->login($post['user_id'], $post['password']))
                {
                    $error = 'User_id or Password Wrong';
                }

                $body = View::factory('problem/submit');
                $body->error = $error;
                $body->pid = $pid;

                $this->view->title = 'Submit';
                $this->view->body = $body;
            } else {
                //TODO:check permission, the user can submit? if not admin, may cause leak or cracked
                // 1. not admin
                // 2. time failed
                // 3. not invite people
                //TODO: validation
                //TODO: add contest problem
                $db = new Model_Problem();
                $post['user_id'] = Auth::instance()->get_user();
                $post['ip'] = Request::$client_ip;
                $ret = $db->new_solution($post);

                $request->redirect('/status');
            }
        }
	}

	public function action_summary()
	{
		// init
		$page_id = $this->request->param('id');
		if ($page_id === NULL) {
			# TODO: redirect to back?
		}

		// db
		$p = new Model_Submisiion();
		$summary = $p->get_summary($page_id);
		$best_solution = $p->get_best_solution($page_id);

		// view

		$body = View::factory('problem/summary');
		$body->summary = $summary;
		$body->solutions = $best_solution;

		$this->view->title = "Summary of {$page_id}";
		$this->view->body = $body;
	}
	
	public function action_search()
	{
		// init
		$text = $this->request->query('text');
		$area = $this->request->query('area');
		
		if ($text === NULL) {
			// TODO: add better handler
			$this->action_list();
		}
		
		// TODO: validation
		
		// db
		$db = new Model_Problem();
		// TODO: add filter
		$list = $db->find_problem($text, $area);
		
		// view
		$body = View::factory('problem/search');
		
		$body->area = $area;
		$body->search_text = $text;
		$body->problemlist = $list;
		
		$this->view->title = "{$text} search result";
		$this->view->body = $body;
	}

} // End Welcome
