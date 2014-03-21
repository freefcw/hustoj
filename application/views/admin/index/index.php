<div class="dashboard-widget row">
    <form role="form" action="<?php e::url('/admin/index/rejudge');?>" method="post" class="form-horizontal col-sm-4">
    <fieldset>
        <legend><?php echo(__('admin.index.index.rejudge')); ?></legend>
        <div class="form-group">
            <label class="control-label col-sm-6" for="type"><?php echo(__('admin.index.index.choose_type')); ?></label>
            <div class="col-sm-6">
                <select class="form-control" name="type" id="type">
                    <option value="PROBLEM"><?php echo(__('admin.index.index.problem')); ?></option>
                    <option value="SOLUTION"><?php echo(__('admin.index.index.runid')); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-6" for="typeid"><?php echo(__('admin.index.index.id')); ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="typeid" id="typeid"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-8">
                <button type="submit" class="btn btn-primary"><?php echo(__('admin.index.index.submit')); ?></button>
            </div>
        </div>
    </fieldset>
    </form>
</div>
