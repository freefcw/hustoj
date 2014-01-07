<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author: freefcw
 * Date: 1/1/14
 * Time: 3:05 PM
 */

class Controller_Solution extends Controller_Base
{

    public function action_source()
    {
        $user = $this->check_login('/');

        $sid = $this->request->param('id');
        $solution = Model_Solution::find_by_id($sid);

        if ( $solution )
        {
            if ($solution->allow_view_code($user))
            {
                $this->template_data['title'] = 'Solution Code';
                $this->template_data['solution'] = $solution;
                return;
            }
        }
        $this->redirect('/');
    }

    public function action_status()
    {
        // init
        $page = $this->get_query('page', 1);
        if ($page < 1) $page = 1;

        $pid = $this->get_query('pid', null);
        $uid = $this->get_query('uid', null);
        $cid = $this->get_query('cid', null);
        $language = $this->get_query('language', null);
        $result = $this->get_query('result', null);

        $per_page = 20;

        $filter = array(
            'problem_id' => $pid,
            'user_id' => $uid,
            'contest_id' => $cid,
            'language' => $language,
            'result' => $result,
        );
        // db

        $filter = $this->clear_data($filter,  array(-1, '', null));

        $orderby = array(
            Model_Solution::$primary_key => Model_Base::ORDER_DESC
        );
        $status = Model_Solution::find($filter, $page, OJ::per_page, $orderby);
        $total = Model_Solution::count($filter);

        // view
        $this->template_data['title'] = 'STATUS';
        $this->template_data['list']  = $status;
        $this->template_data['total'] = ceil($total / $per_page);

        if ( $cid )
        {
            $contest = Model_Contest::find_by_id($cid);
            if ( ! $contest ) $this->redirect(Route::url('default'));

            $this->template_data['cid']     = $cid;
            $this->template_data['contest'] = $contest;
            $this->template_data['title']   = "Contest Status - {$contest['title']}";
        }

    }
}