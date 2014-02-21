<?php
/**
 * @author: freefcw
 * Date: 1/8/14
 * Time: 10:45 PM
 */


class Controller_Mail extends Controller_Base
{
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
        $user = $this->check_login();

        $page = $this->get_query('page', 1);
        $mail_list = Model_Mail::find_user_inbox($user->user_id, $page);

        $this->template_data['title'] = 'Inbox';
        $this->action_list($mail_list);
    }

    public function action_outbox()
    {
        $user = $this->check_login();

        $page = $this->get_query('page', 1);
        $mail_list = Model_Mail::find_user_outbox($user->user_id, $page);

        $this->template_data['title'] = 'Outbox';
        $this->action_list($mail_list);
    }

    public function action_new()
    {
        $current_user = $this->check_login();
        $this->template_data['title'] = 'New Mail';
    }

    public function action_send()
    {
        $current_user = $this->check_login();

        if ( $this->request->is_post() )
        {
            $user_id = $this->get_post('recevier', null);

            $receiver = Model_User::find_by_id($user_id);

            if ( $receiver )
            {
                $title = $this->get_post('title', 'no title');

                $content = $this->get_raw_post('content', 'no content');

                $mail = new Model_Mail;
                $mail->from_user = $current_user->user_id;
                $mail->to_user = $receiver->user_id;
                $mail->content = $content;
                $mail->title = $title;
                $mail->save();
                var_dump($mail);
                $this->redirect('/mail/outbox');
            } else {
                $message = sprintf('Reciver "%s" is not Exist', $user_id);
                throw new Exception_Base($message);
            }
        }
    }

    public function action_view()
    {
        $user = $this->check_login();
        $mail_id = $this->request->param('id');
        $mail = Model_Mail::find_by_id($mail_id);
        if ( !$mail )
            throw new Exception_Base('Mail not exist');

        // 检查权限
        if ( $mail->to_user == $user->user_id
            OR $mail->from_user == $user->user_id )
        {
            $this->template_data['title'] = $mail->title;
            $this->template_data['mail'] = $mail;
        } else {
            $this->redirect('/mail');
        }
    }
}