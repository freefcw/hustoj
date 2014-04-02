<?php
/**
 * @author: freefcw
 * Date: 1/8/14
 * Time: 10:45 PM
 */


class Controller_Mail extends Controller_Base
{

    /* @var Model_User */
    protected $current_user = NULL;

    /* how many mail in one page */
    protected $per_page = 20;

    public function before()
    {
        parent::before();

        $this->current_user = $this->check_login();
    }
    public function action_index()
    {
        $this->request->action('inbox');
        $this->action_inbox();
    }


    public function action_list($mail_list)
    {
        $this->view = 'mail/list';
        $this->template_data['mlist'] = $mail_list;
    }

    public function action_inbox()
    {
        $page = $this->get_query('page', 1);
        $mail_list = Model_Mail::find_user_inbox($this->current_user->user_id, $page, $this->per_page);
        $total = Model_Mail::count_user_inbox($this->current_user->user_id);

        $this->template_data['title'] = __('mail.inbox');
        $this->template_data['base_url'] = '/mail/inbox';
        $this->template_data['total'] = ceil($total / $this->per_page);;
        $this->action_list($mail_list);
    }

    public function action_outbox()
    {
        $page = $this->get_query('page', 1);
        $mail_list = Model_Mail::find_user_outbox($this->current_user->user_id, $page, $this->per_page);
        $total = Model_Mail::count_user_outbox($this->current_user->user_id);

        $this->template_data['title'] = __('mail.outbox');
        $this->template_data['base_url'] = '/mail/outbox';
        $this->template_data['total'] = ceil($total / $this->per_page);;
        $this->action_list($mail_list);
    }

    public function action_new()
    {
        $this->template_data['title'] = __('mail.new_mail');
    }

    public function action_send()
    {
        if ( $this->request->is_post() )
        {
            $user_id = $this->get_post('receiver', null);

            $receiver = Model_User::find_by_id($user_id);

            if ( $receiver )
            {
                $title = $this->get_post('title', 'no title');

                $content = $this->get_raw_post('content', 'no content');

                $mail = new Model_Mail;
                $mail->from_user = $this->current_user->user_id;
                $mail->to_user = $receiver->user_id;
                $mail->content = $content;
                $mail->title = $title;
                $mail->save();
                $this->redirect('/mail/outbox');
            } else {
                $message = __('common.:user_not_found', array(':user' => $user_id));
                throw new Exception_Base($message);
            }
        }
    }

    public function action_view()
    {
        $mail_id = $this->request->param('id');
        $mail = Model_Mail::find_by_id($mail_id);

        if ( !$mail )
            throw new Exception_Base(__('common.mail_not_found'));

        // 检查权限
        if ( $mail->is_owner($this->current_user) OR $this->current_user->is_admin() )
        {

            if ( $mail->is_receiver($this->current_user) )
            {
                $mail->mark_as_read();
            }

            $this->template_data['title'] = $mail->title;
            $this->template_data['mail'] = $mail;
        } else {
            $this->redirect('/mail');
        }
    }
}
