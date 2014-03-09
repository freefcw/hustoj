<div class="dashboard-widget row">
    <form role="form" action="<?php e::url('/admin/index/rejudge');?>" method="post" class="form-horizontal col-sm-4">
    <fieldset>
        <legend>Rejudge</legend>
        <div class="form-group">
            <label class="control-label col-sm-6" for="type">Choose Type</label>
            <div class="col-sm-6">
                <select class="form-control" name="type" id="type">
                    <option value="0" selected="selected">Choose type</option>
                    <option value="PROBLEM">Problem</option>
                    <option value="SOLUTION">Run Id</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-6" for="typeid">ID</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="typeid" id="typeid"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
    </form>
</div>