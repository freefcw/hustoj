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

        if ( $topic_id == NULL ) {
            $this->action_index();
        }

        $topic = Model_Topic::find_by_id($topic_id);
        if ( ! $topic)
            throw new Exception_Page(__('common.discuss_not_found'));

        $cu = $this->get_current_user();
        if ( $this->request->is_post() ) {

            if ( $cu->submit < 1 )
            {
                throw new Exception_Page(__('common.submit_before_topic'));
            }

            $reply = new Model_Reply;
            $reply->author_id = $cu->user_id;
            $reply->topic_id = $topic_id;
            $reply->content = $this->get_raw_post('content');
            $reply->save();
            $this->redirect(Request::current()->uri());
        }

        $relies = $topic->replies();

        $this->template_data['the_topic'] = $topic;
        $this->template_data['relies'] = $relies;
        $this->template_data['title'] = $topic->title;
    }

    public function action_removetopic()
    {
        $this->check_admin();

        $topic_id = $this->request->param('id');

        $topic = Model_Topic::find_by_id($topic_id);
        if ( $topic )
        {
            $topic->destroy();
            $this->redirect('/discuss');
        } else {
            throw new Exception_Page(__('common.discuss_not_found'));
        }
    }

    public function action_removereply()
    {
        $this->check_admin();

        $reply_id = $this->request->param('id');
        if (  ! $reply_id )
            $this->go_home();

        $reply = Model_Reply::find_by_id($reply_id);
        $reply->destroy();
        $this->redirect($this->request->referrer());
    }

    public function action_list()
    {
        $page = $this->get_query('page', 1);

        $filter = array(
            'pid' => $this->get_query('pid'),
            'author_id' => $this->get_query('uid'),
        );

        $filter = Model_Base::clean_data($filter);
        $topic_list = Model_Topic::page($filter, $page, OJ::per_page);
        $total = Model_Topic::count($filter);

        $this->template_data['topic_list'] = $topic_list;
        $this->template_data['total'] = ceil( $total / OJ::per_page);
        $this->template_data['title'] = __('discuss.list.discuss');
    }

    public function action_batch()
    {
        $this->check_admin();

        $topic_id_list = $this->get_post('tid');
        $action = $this->get_post('action');

        $need_block = false;
        if ( $action == 'andblockuser' )
            $need_block = true;

        if (  $topic_id_list )
        {
            foreach($topic_id_list as $topic_id)
            {
                $topic = Model_Topic::find_by_id($topic_id);
                if ( $topic )
                {
                    if ( $need_block )
                    {
                        $author = $topic->author();
                        $author->disable();
                    }
                    $topic->destroy();
                }
            }
        }

        $this->redirect($this->request->referrer());
    }

    public function action_new()
    {
        $this->check_login();
        /* @var Model_User $cu */
        $cu = $this->get_current_user();

        if ( $cu->submit < 1 )
        {
            throw new Exception_Page(__('common.submit_before_topic'));
        }

        if ( $this->request->is_post() ) {

            $topic = new Model_Topic;
            $topic->title = $this->get_post('title');
            $topic->author_id = $cu->user_id;
            $topic->cid = intval($this->get_post('cid'));
            $topic->pid = intval($this->get_post('pid'));
            $topic->save();

            $reply = new Model_Reply;
            $reply->topic_id = $topic->tid;
            $reply->content = $this->get_raw_post('content');
            $reply->author_id = $cu->user_id;
            $reply->save();

            $this->redirect("/discuss/topic/{$topic->tid}");
        }

        $this->view = 'discuss/edit';

        $this->template_data['title'] = __('discuss.edit.new_topic');
    }
}
