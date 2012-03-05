<h2>Edit Problem <?php echo $problem['problem_id'];?></h2>
<form class="form-horizontal" method="POST" action="/admin/problem/edit">
<fieldset>
<legend>Basic Information</legend>
<div class="control-group">
<label class="control-label" for="title">Title</label>
<div class="controls">
<input type="text" class="input-xlarge" name="title" id="title" value="<?php echo $problem['title'];?>">
    <p></p>
    <label class="checkbox" for="spj">
            <input type="checkbox" name='spj' id="spj" <?php if(array_key_exists('disable', $problem) and $problem['spj'] == true):?>checked="checked"<?php endif;?>>
            Special Judge</label>
</div>
</div>
    <div class="control-group">
    <label class="control-label" for="time_limit">Time Limit</label>
    <div class="controls">
        <div class="input-append">
            <input type="text" class="input-xlarge span1" name="time_limit" id="time_limit" value="<?php echo $problem['time_limit'];?>"><span class="add-on">MS</span>
        </div>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="memory_limit">Memory Limit</label>
    <div class="controls">
        <div class="input-append">
            <input type="text" class="input-xlarge span1" name="memory_limit" id="memory_limit" value="<?php echo $problem['memory_limit'];?>"><span
            class="add-on">KB</span>
        </div>
    </div>
    </div>
    <legend>Detail</legend>
    <div class="control-group">
        <label class="control-label" for="description">Description</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="description" class="span8" name="description"><?php echo $problem['description'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="input">Input</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="input" class="span8" name="input"><?php echo $problem['input'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="output">Output</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="output" class="span8" name="output"><?php echo $problem['output'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="sample_input">Sample Input</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="sample_input" class="span8" name="sample_input"><?php echo $problem['sample_input'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="sample_output">Sample Output</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="sample_output" class="span8" name="sample_output"><?php echo $problem['sample_output'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="hint">Hint</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="hint" class="span8" name="hint"><?php echo $problem['hint'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="source">source</label>
        <div class="controls">
            <textarea cols="50" rows="7" id="source" class="span8" name="source"><?php echo $problem['source'];?></textarea>
        </div>
    </div>
    <div class="form-actions">
     <button class="btn btn-primary" type="submit">Save changes</button>
        <button class="btn" onclick="history.back()" type="reset">Cancel</button>
   </div>
</fieldset>
</form>