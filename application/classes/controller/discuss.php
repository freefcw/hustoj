<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 *
 */
class Controller_Discuss extends Controller_My
{

    public function action_index()
    {
        $this->action_page();
    }

    public function action_topic()
    {
        $request = $this->request;
        // init
        $topic_id = intval($request->param('id'));

        if ($topic_id == NULL) {
            $this->action_index();
        }

        $mt = new Model_Topic();
        $topic = $mt->get_topic_by_id($topic_id);
        //TODO: if cannot find the topic

        if ($request->method() == 'POST') {
            $data = array(
                'content'  => $request->post('content'),
                'topic_id' => $topic_id,
                'user_id'  => Auth::instance()->get_user(),
                'status'   => 0,
                'ip'       => $request::$client_ip,
            );
            $mt->add_reply($data);
        }

        $relies = $mt->get_relies_for_topic($topic_id);

        $body = View::factory('discuss/topic');
        $body->bind('the_topic', $topic);
        $body->bind('relies', $relies);

        $this->view->title = 'Discuss';
        $this->view->body = $body;
    }

    public function action_page()
    {
        $page = $this->request->param('id', 0);

        $mt = new Model_Topic();

        $topic_list = $mt->get_page($page);

        $body = View::factory('discuss/list');

        $body->bind('topic_list', $topic_list);

        $this->view->title = 'Discuss';
        $this->view->body = $body;
    }

    public function action_new()
    {
        $mt = new Model_Topic();

        //TODO:add body

        $this->view->title = 'New Topic';
    }
}