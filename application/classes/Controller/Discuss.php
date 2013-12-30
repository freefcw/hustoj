<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 *
 */
class Controller_Discuss extends Controller_Base
{

    public function action_index()
    {
        $this->view = 'discuss/list';
        $this->action_list();
    }

    public function action_topic()
    {
        // init
        $topic_id = intval($this->request->param('id'));

        if ($topic_id == NULL) {
            $this->action_index();
        }

        $topic = Model_Topic::find_by_id($topic_id);
        if ( ! $topic)
            $this->redirect('/discuss');

        $cu = Auth::instance()->get_user();
        if ( $this->request->is_post() ) {
            $reply = new Model_Reply;
            $reply->author_id = $cu->user_id;
            $reply->topic_id = $topic_id;
            $reply->content = $this->get_post('contest');
            $reply->save();
        }

        $relies = $topic->replies();

        $this->template_data['the_topic'] = $topic;
        $this->template_data['relies'] = $relies;
        $this->template_data['title'] = $topic->title;
    }

    public function action_list()
    {
        $page = intval($this->request->param('id', 0));
        $pid = intval($this->request->query('pid', null));
        $user_id = $this->request->query('uid', null);

        $filter = array(
            'pid' => $pid,
            'author_id' => $user_id,
        );
        $filter = $this->clear_data($filter);

        $topic_list = Model_Topic::find($filter, $page);

        $this->template_data['topic_list'] = $topic_list;
        $this->template_data['title'] = 'Discuss';
    }

    public function action_new()
    {
        $cu = Auth::instance()->get_user();

        if ( $this->request->is_post() ) {
            $topic = new Model_Topic;
            $topic->title = $this->get_post('title');
            $topic->author_id = $cu->user_id;
            $topic->cid = intval($this->get_post('cid'));
            $topic->pid = intval($this->get_post('pid'));
            $topic->save();

            $reply = new Model_Reply;
            $reply->topic_id = $topic->tid;
            $reply->content = $this->get_post('content');
            $reply->author_id = $cu->user_id;
            $reply->save();

            $this->redirect("/discuss/topic/{$topic->tid}");
        }

        $this->view = 'discuss/edit';

        $this->template_data['title'] = 'New Topic';
    }
}