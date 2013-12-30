<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contest extends Controller_Base
{

    public function action_index()
    {
        $this->view = 'contest/list';
        $this->action_list();
    }

    public function action_list()
    {
        // initial
        $page = $this->request->param('id', 1);

        $filter = array();
        $contest_list = Model_Contest::find($filter, $page);

        // view
        $this->template_data['list'] = $contest_list;
        $this->template_data['title'] = "Contest List";
    }

    public function action_show()
    {
        // init
        $cid = $this->request->param('id', null);

        if (is_null($cid)) {
            $this->redirect(Route::url('default'));
        }
        $this->template_data['cid'] = $cid;

        $contest = Model_Contest::find_by_id($cid);

        $this->template_data['contest'] = $contest;
        $this->template_data['title'] = "Contest - {$contest['title']}";
    }

    public function action_standing()
    {
        $cid = $this->request->param('id', null);
        if ($cid === null) {
            $this->redirect(Route::url('default'));
        }

        $contest = Model_Contest::find_by_id($cid);

        if ( $contest->is_open() )
        {
            $error = 'Contest Not Open';
        }
        $this->template_data['cid'] = $cid;
        $this->template_data['contest'] = $contest;
        $this->template_data['title'] = "Contest - {$contest['title']} - Standing";
    }

    public function action_statistics()
    {
        // init
        $cid = $this->request->param('id', null);
        if ($cid === null) {
            $this->redirect(Route::url('default'));
        }

        $contest = Model_Contest::find_by_id($cid);
        $ret = $contest->statistics();
        $this->template_data['contest'] = $contest;
        $this->template_data['result'] = $ret['result'];
        $this->template_data['language'] = $ret['language'];
        $this->template_data['title'] = "Contest - {$contest['title']} - Statistics";
        $this->template_data['cid'] = $cid;
    }

    public function action_problem()
    {
        //TODO: check
        $this->view = 'problem/show';
        $pid = $this->request->param('pid', null);
        $cid = $this->request->param('cid', null);

        if (is_null($pid) or is_null($cid)) {
            // wrong url
            $this->redirect(Route::url('default'));
        }

        $contest = Model_Contest::find_by_id($cid);

        if ($contest == null) {
            $error = 'No Such Contest';
        } else {
            if ( $contest->is_open() ) {
                $problem = $contest->problem(intval($pid));
            } else {
                $error = 'Contest is not Open';
            }
        }
        $this->template_data['contest'] = $contest;
        $this->template_data['title'] = "Contest - {$contest['title']}";
        $this->template_data['cid'] = $cid;
        $this->template_data['p'] = $problem;
        $this->template_data['pid'] = $pid;
    }
}