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
		$cid = $this->request->param('id', null);
        if (is_null($cid))
        {
            $this->request->redirect('/home');
        }
		$this->view->set_global('cid', $cid);

		// db
		$c = new Model_Contest();
		$problems = $c->get_contest_problems($cid);
		$contest = $c->get_contest($cid);

		// view
		$body = View::factory('contest/show');
		$body->cid = $cid;
        $body->contest = $contest;
		$body->problems = $problems;
		$body->title = "Contest - {$contest->title}";

		$this->view->title = "Contest - {$contest->title}";
		$this->view->body = $body;
	}

    public function action_standing()
    {
        $cid = $this->request->param('id', null);
        if (is_null($cid))
        {
            $this->request->redirect('/home');
        }

        $db = new Model_Contest();
        if ( !$db->is_contest_open($cid))
        {
            $error = 'Contest Not Open';
        }
        $standing = $db->get_standing($cid);
        $p_count = count($db->get_contest_problems($cid));

        $body = View::factory('contest/standing');
        $body->standing = $standing;
        $body->p_count = $p_count;

        $this->view->set_global('cid', $cid);
        $this->view->title = 'Standing';
        $this->view->body = $body;
    }

	public function action_statics()
	{
		// init
		$cid = $this->request->param('id', null);
        if ($cid === null)
        {
            $this->request->redirect('/home');
        }
		$this->view->set_global('cid', $cid);

		// db
		$c = new Model_Contest();
		$stats = $c->get_statistics($cid);

		// view
		$body = View::factory('contest/stat');
        $body->result = $stats['result'];
        $body->language = $stats['language'];
        $body->problem_count = count($c->get_contest_problems($cid));

		$this->view->title = "Contest Statistics";
        $this->view->set_global('cid', $cid);
		$this->view->body = $body;
	}

    public function action_problem()
    {
        $pid = $this->request->param('pid', null);
        $cid = $this->request->param('cid', null);
        if (is_null($pid) or is_null($cid))
        {
            // wrong url
            $this->request->redirect('/home');
        }

        $db = new Model_Contest();
        $contest = $db->get_contest($cid);
        if ($contest == null)
        {
            $error = 'No Such Contest';
        } else {
            $now = time();
            $begin = strtotime($contest->start_time);
            if($begin > $now)
            {
                $error = 'Contest is not Open';
            } else {
                $mp = new Model_Problem();
                $problem = $mp->get_contest_problem($cid, $pid);
            }
        }

        $this->view->title = $problem->title;
        $body = View::factory('problem/show');
        $body->p = $problem;
        $this->view->set_global('cid', $cid);
        $this->view->set_global('pid', $pid);

        $this->view->body = $body;
    }
}