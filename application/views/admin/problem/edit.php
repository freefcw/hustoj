<?php /* @var Model_Problem $problem */?>
<form class="form-horizontal" method="POST" action="<?php e::url("/admin/problem/edit/{$problem->problem_id}");?>">
<fieldset>
    <legend>Basic Information</legend>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $problem->title;?>">
            <label class="checkbox" for="spj"><input type="checkbox" name="spj" id="spj" <?php if($problem->is_special_judge()):?>checked="checked"<?php endif;?>/>Special Judge</label>
        </div>
    </div>
    <div class="row col-sm-offset-2">
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-4" for="time_limit">Time Limit</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="text" class="form-control" name="time_limit" id="time_limit" value="<?php echo $problem->time_limit;?>"><span class="input-group-addon">S</span>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-4" for="memory_limit">Memory Limit</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="text" class="form-control" name="memory_limit" id="memory_limit" value="<?php echo $problem->memory_limit;?>"><span class="input-group-addon">KB</span>
                </div>
            </div>
        </div>
    </div>
    <legend>Detail</legend>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description">Description</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="13" id="description" class="form-control tinymce" name="description"><?php echo $problem->description;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="input">Input</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="13" id="input" class="form-control tinymce" name="input"><?php echo $problem->input;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="output">Output</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="7" id="output" class="form-control tinymce" name="output"><?php echo $problem->output;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sample_input">Sample Input</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="7" id="sample_input" class="form-control" name="sample_input"><?php echo $problem->sample_input;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sample_output">Sample Output</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="7" id="sample_output" class="form-control" name="sample_output"><?php echo $problem->sample_output;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="hint">Hint</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="3" id="hint" class="form-control tinymce" name="hint"><?php echo $problem->hint;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="source">source</label>
        <div class="col-sm-10">
            <textarea cols="50" rows="2" id="source" class="form-control" name="source"><?php echo $problem->source;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" onclick="history.back()" type="reset">Cancel</button>
        </div>
    </div>
</fieldset>
</form>
