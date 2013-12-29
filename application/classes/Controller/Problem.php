<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Problem extends Controller_Base
{

    public function action_index()
    {
        $this->view = 'problem/list';
        $this->action_list();
    }

    public function action_list()
    {
        $page_id = $this->request->param('id', 1);

        $per_page = 50;

        $filter = array();

        $this->template_data['problemlist'] = Model_Problem::find($filter, $page_id, $per_page, 'ASC');
        //TODO: add check permission of contest
        $total = Model_Problem::count($filter);

        $title = 'Problem Set ' . $page_id;
        $this->template_data['page_id'] = $page_id;
        $this->template_data['pages'] = ceil(intval($total) / $per_page);
        $this->template_data['title'] = $title;
    }

    public function action_show()
    {
        // initial
        $pid = $this->request->param('id', null);

        if ($pid == NULL) {
            $this->redirect('/problem/list');
        }

        $problem = Model_Problem::find_by_id($pid);

        $this->template_data['title'] = $problem['title'];
        $this->template_data['p'] = $problem;
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

//		// validation
//		$validation = Validation::factory(array(
//			'pid' => $pid,
//			'uid' => $uid,
//			'language' => $language,
//			'result' => $result
//			));
//		$validation->rule('pid', 'numeric')
//			->rule('uid', 'regex', array(':value', '/^\w+$/'))
//			->rule('language', 'numeric')
//			->rule('result', 'numeric')
//            ->rule('cid', 'numeric');
//
//		if($validation->check())
//		{
//			// TODO: add more handler
//		} else {
//			echo "error";
//		}

        $filter = array(
            'problem_id' => $pid,
            'user_id' => $uid,
            'contest_id' => $cid,
            'language' => $language,
            'result' => $result,
        );
        // db

        foreach($filter as $k => $v)
        {
            if (is_null($v) or $v === '' or $v == -1) unset($filter[$k]);
        }
        $status = Model_Solution::find($filter, $page);
        $total = Model_Solution::count($filter);

        // view
        $this->template_data['list']= $status;
        $this->template_data['page']= $page;
        $this->template_data['total']= ceil($total / $per_page);
        $this->template_data['pid']= $pid;
        $this->template_data['uid']= $uid;
        $this->template_data['cid']= $cid;
        $this->template_data['language']= $language;
        $this->template_data['result']= $result;

        $this->template_data['title'] = 'STATUS';
    }

    public function action_submit()
    {
        $this->check_login();

        $request = $this->request;
        $pid = $request->param('id', '');

        if ( $this->request->is_get() ) {
            $this->template_data['pid'] = 'pid';
            $cid = $request->query('cid', null);
            $cpid = $request->query('pid', null);
            if ($cid !== null) {
                $this->template_data['cid'] = $cid;
                $this->template_data['cpid'] = $cpid;
            }

            $this->template_data['title'] = 'Subtmit';

        } else {
            if ( $this->request->is_post() ) {
                //TODO:check permission, the user can submit? if not admin, may cause leak or cracked
                // 1. not admin
                // 2. time failed
                // 3. not invite people
                //TODO: validation
                //TODO: add contest problem

                $solution = new Model_Solution();
                $current_user = Auth::instance()->get_user();
                $solution->user_id = $current_user->user_id;
                $solution->ip = Request::$client_ip;
                $solution->update($this->cleaned_post());
                $solution->save();
//                $solution->problem_id = $c

                $request->redirect('/status');
            }
        }
    }

    public function action_summary()
    {
        // init
        $problem_id = $this->request->param('id');
        if ( ! $problem_id )
            $this->redirect('/');

        $this->template_data['summary'] = Model_Solution::get_summry($problem_id);
        $this->template_data['solutions'] = Model_Solution::best_solution($problem_id);

        $this->template_data['title'] = "Summary of {$problem_id}";

    }

    public function action_search()
    {
        // init
        $text = $this->get_query('text');
        $area = $this->get_query('area');

        if ($text === NULL) {
            // TODO: add better handler
            $this->action_list();
        }

        // TODO: validation

        $list = Model_Problem::find_problem($text, $area);

        $this->template_data['area'] = $area;
        $this->template_data['search_text'] = $text;
        $this->template_data['problemlist'] = $list;
        $this->template_data['title'] = "{$text} search result";
    }

} // End Welcome
