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
    <legend>Problem List</legend>
    <div class="control-group">
    <label class="control-label" for="problems">Add Probelm</label>
    <div class="controls">
        <input class="input-xlarge" id="problems" name="problems">
        <input class="input-xlarge" id="problem-list" name="problemlist" type="hidden">
        <p></p>
    </div>
    </div>
        <div class="control-group">
            <div class="controls">
        <ul id="edit-problem-list">
            <?php foreach($contest['plist'] as $p):?>
            <li class="ui-state-default" id="<?php echo $p['p_id'];?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $p['title'];?></li>
            <?php endforeach;?>
        </ul>
        <script>
            function resort_problems()
            {
                $('#problem-list').val('');
                $('#edit-problem-list li').each(function(k,v){
//                    $(this).find('span')[0].innerHTML = String.fromCharCode(k + 65);
//                    alert($(v).attr('title'));
//                    alert($(v).attr('id'));
                    var old_value = $('#problem-list').val();
                    $('#problem-list').val(old_value + k + ':' + $(v).attr('id') + ';');
                });
            }
        	$(function() {
        		$( "#edit-problem-list" ).sortable();
        		$( "#edit-problem-list" ).disableSelection();
                $( "#edit-problem-list").bind('sortstop', function(){
                    resort_problems();
                });
        	});
            $(function(){
                resort_problems();
            });
        </script>
            </div>
        </div>
</fieldset>

<div class="form-actions">
 <button class="btn btn-primary" type="submit">Save changes</button>
 <button class="btn" onclick="history.back()" type="reset">Cancel</button>
</div>
</form>