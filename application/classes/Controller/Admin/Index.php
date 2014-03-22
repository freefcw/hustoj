<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Index extends Controller_Admin_Base
{

    public function action_index()
    {
        $this->template_data['title'] = __('admin.index.index.dashboard');
    }

    public function action_rejudge()
    {
        if ( $this->request->is_post() ) {
            $type = $this->get_post('type');
            $id = intval($this->get_post('typeid'));

            if ($type == 'PROBLEM') {
                $problem = Model_Problem::find_by_id($id);
                if ( $problem )
                {
                    $problem->rejudge();
                    $this->flash_info(__('common.rejudge_:problem',
                        array(':problem' => $problem->problem_id)));
                }
            } else if ($type == 'SOLUTION') {
                $solution = Model_Solution::find_by_id($id);
                if ( $solution )
                {
                    $solution->rejudge();
                    $this->flash_info(__('common.rejudge_:runid',
                        array(':runid' => $solution->solution_id)));
                }
            }
        }
        $this->redirect('/admin/');
    }

}
