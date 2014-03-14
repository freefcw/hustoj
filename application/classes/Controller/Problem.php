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

        $title = __('problem.list.problem_set_:id', array(':id' => $page));
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
            throw new Exception_Base('Not found the problem');
        }
    }

    public function action_submit()
    {
        $current_user = $this->check_login();

        if ( $this->request->is_post() ) {
            $pid = $this->get_post('pid');
            $cid = $this->get_post('cid', null);
            $cpid = $this->get_post('cpid', -1);

            // if no pid, then it should be contest

            // if contest id set, then this submit a contest problem
            if ( $cid AND $cpid !== -1)
            {
                $contest = Model_Contest::find_by_id($cid);
                if ( $contest AND $contest->can_user_access($current_user) )
                {
                    $problem = $contest->problem($cpid);
                    if ( !$problem )
                    {
                        throw new Exception_Base('Not Found this problem');
                    }
                } else {
                    throw new Exception_Base('Not Found this contest');
                }
            } else {
                // so is normal submit
                $problem = Model_Problem::find_by_id($pid);

                if ( ! $problem OR !$problem->can_user_access($current_user) )
                {
                    throw new Exception_Base('Not Found this problem');
                }
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
                // set contest info
                $solution->contest_id = $cid;
                $solution->num = $cpid;
            }
            $solution->ip = Request::$client_ip;
            $solution->save();

            $code->solution_id = $solution->solution_id;
            $code->save();

            $this->redirect('/status');
            return;
        } else {
            $pid = $this->request->param('id', null);
            $this->template_data['pid'] = OJ::clean_data($pid);
        }

        $this->template_data['cid'] = $this->get_query('cid', null);
        $this->template_data['cpid'] = $this->get_query('pid', null);

        $this->template_data['title'] = __('problem.submit.submit_code');
    }

    public function action_summary()
    {
        // init
        $problem_id = $this->request->param('id');
        $problem = Model_Problem::find_by_id($problem_id);

        $current_user = Auth::instance()->get_user();
        if ( ! $problem OR ! $problem->can_user_access($current_user) )
            throw new Exception_Base('Not found the problem');

        $this->template_data['summary'] = $problem->summary();
        $this->template_data['solutions'] = $problem->best_solution();

        $this->template_data['title']
            = __('problem.summary.summary_of_:id', array(':id' => $problem_id));

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
        $this->template_data['title']
            = __(':text_search_result', array(':text' => $text));
    }

} // End Welcome
