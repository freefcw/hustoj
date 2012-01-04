<?php if (isset($error)): ?>
<div class="alert-message error err-notice"><p><?php echo $error; ?></p></div>
<?php endif ?>
<h3 class="page-title">User Login</h3>
<form action="/login" method="post" class="login">
    <fieldset>
    <label><span>Username<!-- or Email --></span><input name="username" type="text" value="<?php echo $username ?>"/></label>
    <label><span>Password</span><input type="password" name="pwd"/></label>
    </fieldset>
    <input value="Login" type="submit" class="btn"> <a href="/lostpassword">Forget Password?</a>
</form>
