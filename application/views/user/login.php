<h2 class="page-title">User Login</h2>
<form action="<?php e::url('/user/login');?>" role="form" method="post" class="form-horizontal col-sm-4 col-sm-offset-4">
    <div class="form-group">
        <label for="username" class="form-group col-sm-4">Username</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $username ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="form-group col-sm-4">Password</label>
        <div class="col-sm-8">
            <input type="password" name="pwd" class="form-control" id="password" placeholder="passowrd"/>
        </div>
    </div>
    <?php if ( OJ::is_captcha_enabled() ):?>
    <div class="form-group">
        <label for="captcha" class="form-group col-sm-4">Captcha *</label>
        <div class="col-sm-8">
            <?php echo $captcha;?>
        </div>
    </div>
    <?php endif;?>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-default">Sign in</button> <a href="<?php e::url('/help');?>">Forget Password?</a>
        </div>
    </div>
</form>