<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:24
 */

class Controller_Admin_Contest extends Controller_Admin_My
{
    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
        // initial
        $page_id = $this->request->param('id', 1);

        // db
        $c = new Model_Contest();
        $contest_list = $c->get_list($page_id);

        // view
        $body = View::factory('admin/contest/list');
        $body->bind('contest_list', $contest_list);

        $this->view->title = 'Contest List';
        $this->view->body = $body;
    }

    public function action_edit()
    {
        $cid = $this->request->param('id', null);

        if ($cid === null) {
            $this->error_page();
        }

        $c = new Model_Contest();
        $contest = $c->get_contest($cid);

        $body = View::factory('admin/contest/edit');
        $body->bind('contest', $contest);

        $this->view->title = 'Edit Contest' . $contest['contest_id'];
        $this->view->body = $body;
    }

    public function action_listuser()
    {
        $cid = $this->request->param('id', null);
        if ($cid === null) {
            $this->error_page();
        }
        $cid = intval($cid);

        $c = new Model_Contest();

        if ($this->request->method() == 'POST') {
            $content = $this->request->post('content');

            $user_id_list = explode("\n", trim($content));

            $c->add_user_to_contest($cid, $user_id_list);
        }

        $contest = $c->get_contest($cid);
        $userlist = $c->get_user_of_contest($cid);

        $body = View::factory('admin/contest/user');
        $body->bind('contest', $contest);
        $body->bind('users', $userlist);

        $this->view->title = 'Member of Contest' . $contest['contest_id'];
        $this->view->body = $body;
    }

    public function action_removeuser()
    {
        if ($this->request->method() == 'POST') {
            $cid = $this->request->post('cid', null);
            $user_id = $this->request->post('uid', null);

            $cid = intval($cid);

            $c = new Model_Contest();

            $c->remove_user_from_contest($cid, $user_id);

            $this->view = '{ok: 0}';
        }
    }
}