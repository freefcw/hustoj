<?php /* @var Model_News $news */
$suffix = 'edit';
if ( $news->news_id ) $suffix = $suffix.'/'.$news->news_id;
?>
<form class="form-horizontal" method="POST" action="<?php e::url("/admin/news/edit/{$news->news_id}");?>">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-sm-2" for="title"><?php echo(__('admin.news.edit.title')); ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $news->title;?>">
                <div class="row col-sm-10">
                    <label class="checkbox col-md-2" for="top"><input type="checkbox" name="top" id="top" <?php if($news->is_top_news()):?>checked="checked" <?php endif;?>/><?php echo(__('admin.news.edit.top')); ?></label>
                    <label class="checkbox col-md-2" for="defunct"><input type="checkbox" name="defunct" id="defunct" <?php if($news->is_defunct()):?>checked="checked" <?php endif;?>/><?php echo(__('admin.news.edit.defunct')); ?></label>
                </div>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2" for="content"><?php echo(__('admin.news.edit.description')); ?></label>
            <div class="col-sm-10">
                <textarea cols="50" rows="13" id="content" class="form-control tinymce" name="content"><?php echo $news->content;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button class="btn btn-primary" type="submit"><?php echo(__('admin.news.edit.save_changes')); ?></button>
                <button class="btn" onclick="history.back()" type="reset"><?php echo(__('admin.news.edit.cancel')); ?></button>
            </div>
        </div>
    </fieldset>
</form>
