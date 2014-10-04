<h2 class="page-title"><?php echo(__('user.login.user_login'));?></h2>
<form action="<?php e::url(e::LOGIN_URL);?>" role="form" method="post" class="form-horizontal col-sm-6 col-sm-offset-2">
    <div class="form-group">
        <label for="username" class="control-label col-sm-4"><?php echo(__('user.login.username'));?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo(__('user.login.username'));?>" value="<?php echo $username ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="control-label col-sm-4"><?php echo(__('user.login.password'));?></label>
        <div class="col-sm-8">
            <input type="password" name="pwd" class="form-control" id="password" placeholder="<?php echo(__('user.login.password'));?>"/>
        </div>
    </div>
    <?php if ( $mode = OJ::is_captcha_enabled() and Session::instance()->get('login_times') > 0 ):?>
    <div class="form-group">
        <label class="col-sm-4 control-label" ><?php echo(__('user.login.captcha'));?></label>
        <div class="col-sm-8">
            <?php echo View::factory('captcha/'. $mode);?>
        </div>
    </div>
    <?php endif;?>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-primary col-sm-4"><?php echo(__('user.login.login'));?></button><a href="<?php e::url('/help');?>" class="forget-password"><?php echo(__('user.login.forget'));?></a>
        </div>
    </div>
</form>
