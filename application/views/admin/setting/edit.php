<?php
$suffix = '';
if ( isset($option['option_id']) )
    $suffix = '/'. $option['option_id'];
?>
<form class="form-horizontal" role="form" method="post" action="/admin/setting/edit<?php echo($suffix);?>">
    <div class="form-group">
        <label for="name" class="col-sm-1 control-label">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo($option['name']);?>">
            <p class="help-block">unique name</p>
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-1 control-label">Description</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="desc" name="desc" value="<?php echo($option['desc']);?>"" >
            <p class="help-block">with description, or format</p>
        </div>
    </div>
    <div class="form-group">
        <label for="value" class="col-sm-1 control-label">Value</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="value" id="value" rows="5" cols="120"><?php echo($option['value']);?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" onclick="history.back()" type="reset">Cancel</button>
        </div>
    </div>
</form>