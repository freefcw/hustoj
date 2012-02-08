<?php if (isset($error)): ?>
<div class="alert-message error err-notice"><p><?php echo $error; ?></p></div>
<?php endif ?>
<h3 class="page-title">User Login</h3>
<form action="/login" method="post" class="form-horizontal span6" style="margin-left: 25%">
    <fieldset>
        <div class="control-group">
    <label>Username<!-- or Email --></label>
            <div class="controls">
            <input name="username" type="text" value="<?php echo $username ?>"/></div>
        </div>
        <div class="control-group">
    <label>Password</label>
            <div class="controls"><input type="password" name="pwd"/></div>
        </div>
    </fieldset>
    <div class="form-actions">
    <input value="Login" type="submit" class="btn btn-primary"> <a href="/lostpassword">Forget Password?</a>
    </div>
</form>
<br style="clear: both;">