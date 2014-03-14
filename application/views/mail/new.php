<div class="row">
    <div class="col-md-2 sidebar">
        <?php echo View::factory('mail/sidebar');?>
    </div>
    <div class="col-md-10">
        <h3><?php echo $title;?></h3>
        <form role="form" class="form-horizontal" method="post" action="<?php e::url('/mail/send');?>">
            <div class="form-group">
                <label class="control-label col-sm-1" for="receiver"><?php echo(__('mail.new.receiver')); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="receiver"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-1" for="title"><?php echo(__('mail.new.title')); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-1" for="content"><?php echo(__('mail.new.content')); ?></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-1">
                    <button class="form-control btn-primary" type="submit"><?php echo(__('mail.new.send')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
