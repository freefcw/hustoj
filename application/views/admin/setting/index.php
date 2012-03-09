<h2>Setting</h2>
<form class="form-horizontal" action="/admin/setting/" method="POST">
  <fieldset>
    <legend>General Setting</legend>
    <div class="control-group">
      <label for="pass" class="control-label">pass</label>
      <div class="controls">
        <input type="text" id="pass" name="pass" class="input-xlarge disabled" value="">
      </div>
    </div>
      <div class="form-actions">
        <button class="btn btn-primary" type="submit">Save changes</button>
          <button class="btn" onclick="history.back()" type="reset">Cancel</button>
      </div>
    </fieldset>
  </form>