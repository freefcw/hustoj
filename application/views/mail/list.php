<div class="row">
    <div class="col-md-2 sidebar">
        <?php echo View::factory('mail/sidebar');?>
    </div>
    <div class="col-md-10">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?php echo(__('mail.list.title')); ?></th>
                <?php if (Request::current()->action() == 'outbox'):?>
                <th><?php echo(__('mail.list.receiver')); ?></th>
                <?php else:?>
                <th><?php echo(__('mail.list.sender')); ?></th>
                <?php endif;?>
                <th><?php echo(__('mail.list.time')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php /* @var Model_Mail[] $mlist */ foreach($mlist as $mail):?>
            <tr>
                <td class="col-md-7">
                    <a class="mail-title" href="<?php e::url("/mail/view/{$mail->mail_id}");?>"><?php echo(HTML::chars($mail->title));?></a>
                    <?php if (Request::current()->action() == 'inbox' and $mail->is_unread() ):?><span class="label label-info"><?php echo __('mail.list.new');?></span>
                    <?php endif;?>
                </td>
                <?php if (Request::current()->action() == 'outbox'):?>
                <td class="col-md-3"><a class="mail-recevier" href="<?php e::url("/u/{$mail->to_user}");?>"><?php echo($mail->to_user);?></a></td>
                <?php else:?>
                <td class="col-md-3"><a class="mail-author" href="<?php e::url("/u/{$mail->from_user}");?>"><?php echo($mail->from_user);?></a></td>
                <?php endif;?>
                <td ><?php echo($mail->in_date);?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php echo(View::factory('block/pager', array('base_url' => $base_url, 'total' => $total)));?>
