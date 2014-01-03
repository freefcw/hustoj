<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author: freefcw
 * Date: 1/1/14
 * Time: 3:05 PM
 */

class Controller_Solution extends Controller_Base
{
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
        $orderby = array(
            Model_Solution::$primary_key => Model_Base::ORDER_DESC
        );
        $status = Model_Solution::find($filter, $page, OJ::per_page, $orderby);
        $total = Model_Solution::count($filter);

        // view
        $this->template_data['list']= $status;
        $this->template_data['total']= ceil($total / $per_page);
        $this->template_data['title'] = 'STATUS';
    }
}