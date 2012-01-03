<h2 class="page-title">Register Information</h2>
<form action="/account/new" method="POST" class="login">
<fieldset>
<label><span>User ID(3-15)*:</span><input name="username" type="text" /></label>
<label><span>Nick Name(0-10):</span><input name="nick" type="text" /></label>
<label><span>Password(min 6)*:</span><input name="password" type="password" /></label>
<label><span>Repeat Password*:</span><input name="confirm" type="password" /></label>
<label><span>School(30):</span><input name="school" type="text" /></label>
<label><span>Email(30)*:</span><input name="email" type="text" /></label>
</fieldset>
<input type="submit" name="submit" class="btn"/>
<input type="reset" name="reset" class="btn"/>
</form>