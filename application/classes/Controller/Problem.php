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
        $page = $this->request->param('id', 1);

        $filter = array(
            'defunct' => Model_Base::DEFUNCT_NO
        );

        $orderby = array(
            Model_Problem::$primary_key => Model_Base::ORDER_ASC
        );
        $this->template_data['problemlist'] = Model_Problem::find($filter, $page, OJ::per_page, $orderby);
        //TODO: add check permission of contest
        $total = Model_Problem::count($filter);

        $title = 'Problem Set ' . $page;
        $this->template_data['pages'] = ceil(intval($total) / OJ::per_page);
        $this->template_data['title'] = $title;
    }

    public function action_show()
    {
        // initial
        $pid = $this->request->param('id', null);

        $problem = Model_Problem::find_by_id($pid);
        $current_user = Auth::instance()->get_user();
        if ( $problem AND $problem->can_user_access($current_user) )
        {
            $this->template_data['title'] = $problem['title'];
            $this->template_data['problem'] = $problem;
        } else {
            $this->redirect('/problem/list');
        }
    }

    public function action_submit()
    {
        $current_user = $this->check_login();

        $pid = $this->request->param('id', '');

        if ( $this->request->is_post() ) {
            $pid = $this->get_post('pid');
            $cid = $this->get_post('cid', null);
            $cpid = $this->get_post('cpid', -1);

            // if no pid, then it should be contest
            $problem = Model_Problem::find_by_id($pid);
            if ( !$problem OR  !$problem->can_user_access($current_user) )
            {
                $contest = Model_Contest::find_by_id($cid);
                if ( !$contest OR !$contest->can_user_access($current_user))
                {
                    $this->redirect('/');
                }
                $problem = $contest->problem($cpid);
            }
            $code = new Model_Code;
            $code->source = $this->get_raw_post('source');

            $solution = new Model_Solution();
            $solution->user_id = $current_user->user_id;
            $solution->problem_id = $problem->problem_id;
            $solution->code_length = strlen($code->source);
            $solution->language = $this->get_post('language');
            if ( $cid )
            {
                $solution->contest_id = $cid;
                $solution->num = $cpid;
            }
            $solution->ip = Request::$client_ip;
            $solution->save();

            $code->solution_id = $solution->solution_id;
            $code->save();

//                $solution->problem_id = $c

            $this->redirect('/status');
            return;
        }

        $this->template_data['pid'] = OJ::clean_data($pid);

        $cid = $this->get_query('cid', null);
        $cpid = $this->get_query('pid', null);
        if ( $cid ) {
            $this->template_data['cid'] = OJ::clean_data($cid);
            $this->template_data['cpid'] = OJ::clean_data($cpid);
        }

        $this->template_data['title'] = 'Subtmit';

    }

    public function action_summary()
    {
        // init
        $problem_id = $this->request->param('id');
        $problem = Model_Problem::find_by_id($problem_id);

        $current_user = Auth::instance()->get_user();
        if ( ! $problem OR ! $problem->can_user_access($current_user) )
            $this->redirect(Route::url('default'));

        $this->template_data['summary'] = $problem->summary();
        $this->template_data['solutions'] = $problem->best_solution();

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

        $list = Model_Problem::search($text, $area);

        $this->template_data['area'] = $area;
        $this->template_data['search_text'] = $text;
        $this->template_data['problemlist'] = $list;
        $this->template_data['title'] = "{$text} search result";
    }

} // End Welcome
