<form class="form-horizontal" action="/admin/setting/" method="POST">
        <fieldset>
        <legend>General Setting</legend>
        <div class="form-group">
            <label for="pass" class="control-label col-sm-2">pass</label>
            <div class="col-sm-10">
                <input type="text" id="pass" name="pass" class="form-control" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" onclick="history.back()" type="reset">Cancel</button>
            </div>
        </div>
    </fieldset>
</form>