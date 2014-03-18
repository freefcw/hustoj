<form role="form" class="form-horizontal submit" action="<?php e::url('/problem/submit');?>" method="POST">
<fieldset>
<?php if ( $cid ):?>
    <input type="hidden" value="<?php echo($cid);?>" name="cid"/>
    <input type="hidden" value="<?php echo($cpid);?>" name="cpid"/>
    <div class="title-contest-problem">
        <h3><?php echo(__('problem.submit.problem_:cpid_of_:cid', array(':cpid' => e::contest_pid($cpid), ':cid' => $cid))); ?></h3>
    </div>
<?php else: ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="pid"><?php echo(__('problem.submit.problem_id')); ?></label>
    <div class="col-sm-9">
        <input class="form-control" name="pid" value="<?php echo($pid);?>">
    </div>
</div>
<?php endif;?>
<div class="form-group">
    <label for="language" class="control-label col-sm-3"><?php echo(__('problem.submit.language')); ?></label>
    <div class="col-sm-9">
        <select name="language" class="form-control">
        <?php foreach( OJ::$language as $key => $lang):?>
            <option value="<?php echo($key);?>" <?php if ($key == $default_lang) echo('selected'); ?>>
                <?php echo($lang);?>
            </option>
        <?php endforeach;?>
        </select>
    </div>
</div>
</fieldset>
<div class="form-group">
    <textarea class="form-control" cols="50" rows="20" name="source" spellcheck="false"></textarea>
</div>
<div class="form-group" id="fn-nav">
    <div>
        <button type="submit" class="btn btn-primary"><?php echo(__('problem.submit.submit')); ?></button>
    </div>
</div>
</form>
