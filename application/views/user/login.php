<h2 class="page-title">User Login</h2>
<form action="<?php e::url('/user/login');?>" role="form" method="post" class="form-horizontal col-sm-6 col-sm-offset-2">
    <div class="form-group">
        <label for="username" class="control-label col-sm-4">Username</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $username ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="control-label col-sm-4">Password</label>
        <div class="col-sm-8">
            <input type="password" name="pwd" class="form-control" id="password" placeholder="passowrd"/>
        </div>
    </div>
    <?php if ( $mode = OJ::is_captcha_enabled() ):?>
    <div class="form-group">
        <label class="col-sm-4 control-label" >Captcha *</label>
        <div class="col-sm-8">
            <?php echo View::factory('captcha/'. $mode);?>
        </div>
    </div>
    <?php endif;?>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default">Sign in</button> <a href="<?php e::url('/help');?>" class="forget-password">Forget Password?</a>
        </div>
    </div>
</form>