<?php if (isset($error)): ?>
<p class="message">Some errors were encountered, please check the details you entered.</p>
<?php echo $error; ?>
<?php endif ?>
<form action="/signin" method="post" class="login">
    <fieldset style="width: 220px;">
    <label><span>Username or Email</span><input name="username" type="text" value="<?php echo $post['username']; ?>"/></label>
    <label><span>Password</span><input type="password" name="pwd"/></label>
    </fieldset>
    <input value="Login" type="submit" class="btn">
</form>
