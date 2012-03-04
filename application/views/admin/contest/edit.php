<h2>Edit Contest <?php echo $contest['contest_id'];?></h2>
<form class="form-horizontal" method="POST" action="/admin/contest/edit/<?php echo $contest['contest_id']; ?>">
<fieldset>
<legend>Basic Information</legend>
<div class="control-group">
<label class="control-label" for="title">Title</label>
<div class="controls">
<input type="text" class="input-xxlarge" name="title" id="title" value="<?php echo $contest['title'];?>">
    <p></p>
    <label class="checkbox" for="private">
        <input type="checkbox" name='private' id="private" <?php if (array_key_exists('private', $contest) and $contest['private'] == true ): ?>checked="checked"<?php endif;?>>
       Private Contest
    </label>
    <p></p>
</div>

<label class="control-label" for="start_time">Start Time</label>
<div class="controls">
    <input class="input-xlarge" id="start_time" name="start_time" value="<?php echo OJ::mtime($contest['start_time']);?>">
    <p></p>
</div>
    
<label class="control-label" for="end_time">Start Time</label>
<div class="controls">
    <input class="input-xlarge" id="end_time" name="end_time" value="<?php echo OJ::mtime($contest['end_time']);?>">
</div>
</div>
<div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
        <textarea cols="50" rows="7" id="description" class="span8" name="description"><?php //echo $contest['description'];?></textarea>
    </div>
</div>


</fieldset>
<legend>Problem List</legend>
    <ul>
        <?php foreach($contest['plist'] as $p):?>
        <li><?php echo $p['title'];?></li>
        <?php endforeach;?>
    </ul>
<div class="form-actions">
 <button class="btn btn-primary" type="submit">Save changes</button>
 <button class="btn" onclick="history.back()" type="reset">Cancel</button>
</div>
</form>


<?php var_dump($contest);?>