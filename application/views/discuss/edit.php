<h3 class="page-title"><?php echo(__('discuss.edit.new_topic')); ?></h3>
<form class="new-topic form-horizontal" action="<?php e::url('discuss/new');?>" method="POST" >
    <div class="form-group">
        <label class="control-label col-sm-5" for="pid"><?php echo(__('discuss.edit.problem_id')); ?></label>
        <div class="col-sm-7">
            <?php if ( Request::$current->query('cid') ):?>
            <input name="cid" value="<?php echo(Request::$current->query('cid'));?>" type="hidden"/>
            <?php endif;?>
            <input class="form-control" type="text" name="pid" id="pid"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="title"><?php echo(__('discuss.edit.title')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" type="text" name="title" id="title"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="content"><?php echo(__('discuss.edit.content')); ?></label>
        <div class="col-sm-7">
            <textarea class="form-control" rows="10" cols="10" id="content" name="content"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7">
            <button type="submit" class="btn btn-primary"><?php echo(__('discuss.edit.submit')); ?></button>
        </div>
    </div>
</form>
