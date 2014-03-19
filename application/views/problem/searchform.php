<form class="form-inline well" role="form" action="<?php e::url('/problem/search');?>" method="GET">
    <div class="form-group">
        <label class="sr-only" for="text"><?php echo(__('problem.searchform.search_text')); ?></label>
        <input placeholder="<?php echo(__('problem.searchform.search')); ?>" name="text" id="text" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="area"><?php echo(__('problem.searchform.type')); ?></label>
        <select name="area" class="form-control">
            <option value="title"><?php echo(__('problem.searchform.title')); ?></option>
            <option value="source"><?php echo(__('problem.searchform.source')); ?></option>
        </select>
    </div>
    <input type="submit" value="<?php echo(__('problem.searchform.go')); ?>" class="btn btn-default">
</form>
