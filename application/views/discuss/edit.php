<h3 class="page-title">New Topic</h3>

<form action="/discuss/new" method="POST" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="pid">Problem ID</label>

            <div class="controls">
                <input type="text" class="input-xlarge span1" name="pid" id="pid"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="title">Title</label>

            <div class="controls">
                <input type="text" class="input-xlarge span4" name="title" id="title"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="content">Content</label>

            <div class="controls">
                <textarea rows="10" cols="10" class="span6" id="content" name="content"></textarea>
            </div>
        </div>

    </fieldset>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn">Cancel</button>
    </div>
</form>