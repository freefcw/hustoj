<?php /* @var Model_Problem $news */
$suffix = 'edit';
if ( $news->news_id ) $suffix = $suffix.'/'.$news->news_id;
?>
<form class="form-horizontal" method="POST" action="/admin/news/edit/<?php echo $news->news_id;?>">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $news->title;?>">
                <label class="checkbox" for="defunct"><input type="checkbox" name="defunct" id="defunct" <?php if($news->is_defunct()):?>checked="checked" <?php endif;?>/>defunct</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="content">Description</label>
            <div class="col-sm-10">
                <textarea cols="50" rows="13" id="content" class="form-control" name="content"><?php echo $news->content;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button class="btn btn-primary" type="submit">Save News</button>
                <button class="btn" onclick="history.back()" type="reset">Cancel</button>
            </div>
        </div>
    </fieldset>
</form>