<h2 class="page-title">Register Information</h2>
<form action="/account/new" method="POST" class="form-horizontal span6" style="margin-left: 25%">
<fieldset>
    <div class="control-group">
<label>User ID(3-15)*</label>
        <div class="controls">
            <input name="username" type="text" /></div>
        </div>
    <div class="control-group">
<label>Nick Name(0-10)</label>
        <div class="controls"><input name="nick" type="text" /></div>
        </div>
    <div class="control-group">
<label>Password(min 6)*</label>
        <div class="controls"><input name="password" type="password" /></div>
        </div>
    <div class="control-group">
<label>Repeat Password*</label><div class="controls"><input name="confirm" type="password" /></div></div>
    <div class="control-group">
<label>School(30)</label><div class="controls"><input name="school" type="text" /></div>
        </div>
    <div class="control-group">
<label>Email(30)*</label><div class="controls"><input name="email" type="text" /></div>
    </div>
</fieldset>
<div class="form-actions">
<input type="submit" name="submit" class="btn btn-primary" value="Register"/>
<input type="reset" name="reset" class="btn"/>
</div>
</form>
<br style="clear: both;"/>