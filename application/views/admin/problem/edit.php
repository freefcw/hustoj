<?php /* @var Model_Problem $problem */?>
<form class="form-horizontal" method="POST" action="<?php e::url("/admin/problem/edit/{$problem->problem_id}");?>">
<fieldset>
    <legend><?php echo(__('admin.problem.edit.basic')); ?></legend>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php echo(__('admin.problem.edit.title')); ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $problem->title;?>">
            <label class="checkbox" for="spj"><input type="checkbox" name="spj" id="spj" <?php if($problem->is_special_judge()):?>checked="checked"<?php endif;?>/><?php echo(__('admin.problem.edit.spj')); ?></label>
        </div>
    </div>
    <div class="row col-sm-offset-2">
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-4" for="time_limit"><?php echo(__('admin.problem.edit.time_limit')); ?></label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="text" class="form-control" name="time_limit" id="time_limit" value="<?php echo $problem->time_limit;?>"><span class="input-group-addon"><?php echo(__('admin.problem.edit.second')); ?></span>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-4" for="memory_limit"><?php echo(__('admin.problem.edit.memory_limit')); ?></label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="text" class="form-control" name="memory_limit" id="memory_limit" value="<?php echo $problem->memory_limit;?>"><span class="input-group-addon"><?php echo(__('admin.problem.edit.MB')); ?></span>
                </div>
            </div>
        </div>
    </div>
    <legend><?php echo(__('admin.problem.edit.detail')); ?></legend>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php echo(__('admin.problem.edit.description')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="13" id="description" class="form-control tinymce" name="description"><?php echo $problem->description;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="input"><?php echo(__('admin.problem.edit.input')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="13" id="input" class="form-control tinymce" name="input"><?php echo $problem->input;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="output"><?php echo(__('admin.problem.edit.output')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="7" id="output" class="form-control tinymce" name="output"><?php echo $problem->output;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sample_input"><?php echo(__('admin.problem.edit.sample_input')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="7" id="sample_input" class="form-control" name="sample_input"><?php echo $problem->sample_input;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sample_output"><?php echo(__('admin.problem.edit.sample_output')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="7" id="sample_output" class="form-control" name="sample_output"><?php echo $problem->sample_output;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="hint"><?php echo(__('admin.problem.edit.hint')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="3" id="hint" class="form-control tinymce" name="hint"><?php echo $problem->hint;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="source"><?php echo(__('admin.problem.edit.source')); ?></label>
        <div class="col-sm-10">
            <textarea cols="50" rows="2" id="source" class="form-control" name="source"><?php echo $problem->source;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="btn btn-primary" type="submit"><?php echo(__('admin.problem.edit.save')); ?></button>
            <button class="btn btn-default" onclick="history.back()" type="reset"><?php echo(__('admin.problem.edit.cancel')); ?></button>
        </div>
    </div>
</fieldset>
</form>
