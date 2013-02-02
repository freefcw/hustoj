<h2>HUST Online Judge Dashboard</h2>
<div class="dashboard-widget span4">
    <h3>Rejudge</h3>
    <form action="/admin/rejudge" method="post" class="form-inline">
        <div class="control-group">
            <label class="control-label" for="type">Choose Type</label>
            <div class="controls">
                <select name="type" id="type">
                    <option value="0" selected="selected">Choose type</option>
                    <option value="pid">Problem</option>
                    <option value="rid">Run Id</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeid">Run ID</label>
            <div class="controls">
                <input type="text" class="input-xlarge span4" name="typeid" id="typeid"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<br style="clear: both"/>