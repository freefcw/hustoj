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

        if ($pid == NULL) {
            $this->redirect('/problem/list');
        }

        $problem = Model_Problem::find_by_id($pid);

        $this->template_data['title'] = $problem['title'];
        $this->template_data['p'] = $problem;
    }


    public function action_submit()
    {
        $this->check_login();

        $pid = $this->request->param('id', '');

        if ( $this->request->is_post() ) {
            //TODO:check permission, the user can submit? if not admin, may cause leak or cracked
            // 1. not admin
            // 2. time failed
            // 3. not invite people
            //TODO: validation
            //TODO: add contest problem
//            $problem = Model_Problem::find_by_id($pid);
//            $problem->can_user_access();

            $solution = new Model_Solution();
            $current_user = Auth::instance()->get_user();
            $solution->user_id = $current_user->user_id;
            $solution->ip = Request::$client_ip;
            $solution->update($this->cleaned_post());
            $solution->save();
//                $solution->problem_id = $c

            $this->redirect('/status');
            return;
        }

        $this->template_data['pid'] = $pid;
        $cid = $this->get_query('cid', null);
        $cpid = $this->get_query('pid', null);
        if ($cid !== null) {
            $this->template_data['cid'] = $cid;
            $this->template_data['cpid'] = $cpid;
        }

        $this->template_data['title'] = 'Subtmit';

    }

    public function action_summary()
    {
        // init
        $problem_id = $this->request->param('id');
        $problem = Model_Problem::find_by_id($problem_id);
        if ( ! $problem )
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
