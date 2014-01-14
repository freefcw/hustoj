<div class="row">
    <div class="col-md-2 sidebar">
        <?php echo View::factory('mail/sidebar');?>
    </div>
    <div class="col-md-10">
        <h3><?php echo $title;?></h3>
        <div class="mail">
            <div class="panel panel-success meta">
                <div class="panel-body">
                    Title: <span><?php echo($mail->title);?></span><br />
                    Sender: <?php echo($mail->from_user);?><br />
                    Time: <?php echo $mail->in_date;?>
                </div>
            </div>
            <div class="panel panel-primary content">
                <div class="panel-body">
                    <?php echo($mail->content);?>
                </div>
            </div>
        </div>
        <?php if ($mail->from_user != $current_user->user_id):?>
        <form role="form" class="form-horizontal" method="post" action="/mail/send">
            <input class="hidden" type="hidden" name="recevier" value="<?php echo($mail->from_user);?>">
            <div class="form-group">
                <label class="control-label col-sm-1" for="title">Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title" id="title"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-1" for="content">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" rows="10" id="title"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-1">
                    <button class="form-control btn-primary" type="submit">Send</button>
                </div>
                <div class="col-sm-2">
                    <button class="form-control btn-default" type="reset">Reset</button>
                </div>
            </div>
        </form>
        <?php endif;?>
    </div>
</div>