<div class="row">
    <div class="col-md-2 sidebar">
        <?php echo View::factory('mail/sidebar');?>
    </div>
    <div class="col-md-10">
        <h3><?php echo $title;?></h3>
        <div class="mail">
            <div class="panel panel-success meta">
                <div class="panel-body">
                    <?php echo(__('mail.view.title')); ?><span><?php echo(HTML::chars($mail->title));?></span><br />
                    <?php echo(__('mail.view.sender')); ?><?php echo($mail->from_user);?><br />
                    <?php echo(__('mail.view.time')); ?><?php echo $mail->in_date;?>
                </div>
            </div>
            <div class="panel panel-primary content">
                <div class="panel-body">
                    <?php echo(HTML::chars($mail->content));?>
                </div>
            </div>
        </div>
        <?php if ($mail->from_user != $current_user->user_id):?>
        <form role="form" class="form-horizontal" method="post" action="<?php e::url('/mail/send');?>">
            <input class="hidden" type="hidden" name="receiver" value="<?php echo($mail->from_user);?>">
            <div class="form-group">
                <label class="control-label col-sm-1" for="title"><?php echo(__('mail.new.title')); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title" id="title"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-1" for="content"><?php echo(__('mail.new.content')); ?></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" rows="10" id="content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-1">
                    <button class="form-control btn-primary" type="submit"><?php echo(__('mail.new.send')); ?></button>
                </div>
            </div>
        </form>
        <?php endif;?>
    </div>
</div>
