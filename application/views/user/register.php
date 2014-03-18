<h2 class="page-title"><?php echo(__('user.register.user_register')); ?></h2>
<form role="form" class="form-horizontal col-sm-6 col-sm-offset-2" action="<?php e::url('/user/register');?>" method="POST">
    <div class="form-group">
        <label for="username" class="col-sm-5 control-label"><?php echo(__('user.register.username')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" id="username" name="username" type="text" placeholder="<?php echo(__('user.register.3_to_15')); ?>"/></div>
        </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="nick"><?php echo(__('user.register.nick')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" name="nick" id="nick" type="text" placeholder="<?php echo(__('user.register.max_10')); ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="password"><?php echo(__('user.register.password')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" id="password" name="password" type="password" placeholder="<?php echo(__('user.register.min_6')); ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="confirm"><?php echo(__('user.register.confirm')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" id="confirm" name="confirm" type="password" placeholder="<?php echo(__('user.register.required')); ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="school"><?php echo(__('user.register.school')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" name="school" id="school" type="text" placeholder="<?php echo(__('user.register.max_30')); ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="email"><?php echo(__('user.register.email')); ?></label>
        <div class="col-sm-7">
            <input class="form-control" name="email" id="email" type="text" placeholder="<?php echo(__('user.register.1_to_30')); ?>"/>
        </div>
    </div>
    <?php if ( $mode = OJ::is_captcha_enabled() ):?>
    <div class="form-group">
        <label class="col-sm-5 control-label"><?php echo(__('user.register.captcha')); ?></label>
        <div class="col-sm-7">
        <?php echo View::factory('captcha/'. $mode);?>
        </div>
    </div>
    <?php endif;?>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7">
            <input type="submit" class="btn btn-primary col-sm-8" value="<?php echo(__('user.register.register')); ?>"/>
        </div>
    </div>
</form>
