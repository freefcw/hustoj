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
        $user = $this->check_login();

        $sid = $this->request->param('id');
        $solution = Model_Solution::find_by_id($sid);
        $cinfo = Model_CInfo::for_solution($sid);
        $rinfo = Model_RInfo::for_solution($sid);

        if ( $solution and $solution->allow_view_code($user) )
        {
            $this->template_data['title'] = __('solution.source.solution_detail');
            $this->template_data['solution'] = $solution;
            $this->template_data['cinfo'] = $cinfo;
            $this->template_data['rinfo'] = $rinfo;
        } else {
            throw new Exception_Page(__('common.solution_detail_not_found'));
        }
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

        $per_page = OJ::per_page;

        $filter = array(
            'problem_id' => $pid,
            'user_id' => $uid,
            'contest_id' => $cid,
            'language' => $language,
            'result' => $result,
        );

        $filter = $this->clear_data($filter,  array(-1, '', null));

        $orderby = array(
            Model_Solution::$primary_key => Model_Base::ORDER_DESC
        );
        $status = Model_Solution::find($filter, $page, $per_page, $orderby);
        $total = Model_Solution::count($filter);

        // view
        $this->template_data['title'] = __('solution.status.status');
        $this->template_data['list']  = $status;
        $this->template_data['total'] = ceil($total / $per_page);

        if ( $cid )
        {
            $contest = Model_Contest::find_by_id($cid);
            if ( ! $contest )
            {
                $this->go_home();
            }

            $this->template_data['cid']     = $cid;
            $this->template_data['contest'] = $contest;
            $this->template_data['title']   = "{$contest['title']} - Status";
        }

    }
}
