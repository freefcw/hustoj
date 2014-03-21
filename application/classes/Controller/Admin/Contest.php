<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:24
 */

class Controller_Admin_Contest extends Controller_Admin_Base
{
    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
        $this->view = 'admin/contest/list';
        // initial
        $page_id = $this->get_query('page', 1);

        $contest_list = Model_Contest::find(array(), $page_id);

        $this->template_data['total'] = Model_Contest::count();
        $this->template_data['contest_list'] = $contest_list;
        $this->template_data['title'] = __('admin.contest.list.contest_list');
    }

    public function action_edit()
    {
        $cid = $this->request->param('id', null);
        if ($cid)
        {
            $contest = Model_Contest::find_by_id($cid);
        } else {
            $contest = new Model_Contest;
        }

        if ( $this->request->is_post() )
        {
            $safe_data = $this->cleaned_post();
            $contest->update($safe_data);
            if ( ! in_array('private', $safe_data) )
                $contest->private = 0;
            $contest->save();
            $orderlist = $safe_data['problemlist'];
            $contest->arrange_problem($orderlist);
        }

        $this->template_data['title'] = __('admin.contest.edit.edit_contest') . $contest['contest_id'];
        $this->template_data['contest'] = $contest;

    }

    public function action_new()
    {
        $this->view = 'admin/contest/edit';
        $contest = new Model_Contest;
        $this->template_data['contest'] = $contest;
        $this->template_data['title'] = __('admin.contest.edit.new_contest');

    }

    public function action_member()
    {
        $cid = $this->request->param('id', null);

        $contest = Model_Contest::find_by_id($cid);
        if ( $this->request->is_post() )
        {
            $content = $this->get_post('content');

            $user_id_list = explode("\n", trim($content));

            $contest->add_member($user_id_list);
        }

        $contest = Model_Contest::find_by_id($cid);
        $this->template_data['users'] = $contest->members();
        $this->template_data['contest'] = $contest;
        $this->template_data['title'] =
            __('admin.contest.member.member_of_contest_:name',
                array(':name' => $contest->contest_id));
    }

    public function action_removeuser()
    {
        if ($this->request->method() == 'POST') {
            $cid = $this->request->post('cid', null);
            $user_id = $this->request->post('uid', null);

            $contest = Model_Contest::find_by_id($cid);
            $contest->remove_member($user_id);

            $this->response->body('{ok: 0}');
        }
    }
}
