<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contest extends Controller_My {

	public function action_index()
    {
        $this->action_list();
    }

    public function set_contest_info($contest)
    {
        $this->view->set_global('contest', $contest);
        $this->view->set_global('title', "Contest - {$contest['title']}");
    }
	public function action_list(){
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

        $c = new Model_Contest();
        $contest = $c->get_contest($cid);

        $this->set_contest_info($contest);

		// view
		$body = View::factory('contest/show');
		$body->cid = $cid;


		$this->view->title = "Contest - {$contest['title']}";
		$this->view->body = $body;
	}

    public function action_standing()
    {
        $cid = $this->request->param('id', null);
        if ($cid === null)
        {
            $this->request->redirect('/home');
        }

        $db = new Model_Contest();
        if ( !$db->is_contest_open($cid))
        {
            $error = 'Contest Not Open';
        }
        $this->set_contest_info($db->get_contest($cid));
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

        $this->set_contest_info($c->get_contest($cid));

		// view
		$body = View::factory('contest/stat');
        $body->result = $stats['result'];
        $body->language = $stats['language'];
        $body->set('problem_count', count($c->get_contest_problems($cid)));

		$this->view->title = "Contest Statistics";
        $body->set_global('cid', $cid);
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
        $this->set_contest_info($contest);
        if ($contest == null)
        {
            $error = 'No Such Contest';
        } else {
            $now = time();
            $begin = $contest['start_time']->sec;
            if($begin > $now)
            {
                $error = 'Contest is not Open';
            } else {
                $mp = new Model_Problem();
                $plist = $contest['plist'];

                $problem = $mp->get_problem_by_id($plist[intval($pid)]['p_id']);
            }
        }

        $this->view->title = $problem['title'];
        $body = View::factory('problem/show');
        $body->p = $problem;
        $this->view->set_global('cid', $cid);
        $this->view->set_global('pid', $pid);

        $this->view->body = $body;
    }
}