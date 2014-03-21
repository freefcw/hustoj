<?php /* @var Model_User $user */?>
<div class="row">
    <div class="col-sm-8">
        <form class="form-horizontal" action="<?php e::url("/admin/user/edit/{$user['user_id']}"); ?>" method="POST">
            <fieldset>
                <legend><?php echo(__('admin.user.edit.basic')); ?></legend>
                <div class="form-group">
                    <label for="user_id" class="control-label col-sm-2"><?php echo(__('admin.user.edit.username')); ?></label>
                    <div class="col-sm-10">
                        <input type="text" id="user_id" name="user_id" readonly="readonly" class="form-control disabled" value="<?php echo $user['user_id']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nick" class="control-label col-sm-2"><?php echo(__('admin.user.edit.nick')); ?></label>
                    <div class="col-sm-10">
                        <input type="text" id="nick" name="nick" class="form-control" value="<?php echo $user['nick']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-sm-2"><?php echo(__('admin.user.edit.password')); ?></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo(__('admin.user.edit.not_change')); ?>">
                    </div>
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="password" class="form-control" name="repassword" placeholder="<?php echo(__('admin.user.edit.repeat')); ?>">
                    </div>
                </div>
                    <legend><?php echo(__('admin.user.edit.contact')); ?></legend>
                <div class="form-group">
                    <label for="school" class="control-label col-sm-2"><?php echo(__('admin.user.edit.school')); ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="school" id="school" value="<?php echo $user['school']; ?>">
                        <p class="help-block"></p>
                    </div>
                    <label for="email" class="control-label col-sm-2"><?php echo(__('admin.user.edit.email')); ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="textarea" class="control-label col-sm-2"><?php echo(__('admin.user.edit.intro')); ?></label>
                    <div class="col-sm-10">
                        <textarea cols="50" rows="3" id="textarea" class="form-control" name="intro"><?php echo($user['intro']);?></textarea>
                    </div>
                </div>
                <legend><?php echo(__('admin.user.edit.other')); ?></legend>
                <div class="form-group">
                    <label for="disabled" class="control-label col-sm-2"><?php echo(__('admin.user.edit.disable_user')); ?></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="disabled" name="disabled">
                            <option value="0"
                                    <?php if (array_key_exists('disabled', $user) and $user['disabled'] == false): ?>selected="selected"<?php endif; ?>>
                                <?php echo(__('admin.user.edit.enabled')); ?>
                            </option>
                            <option value="1"
                                    <?php if (array_key_exists('disabled', $user) and $user['disabled'] == true): ?>selected="selected"<?php endif; ?>>
                                <?php echo(__('admin.user.edit.disabled')); ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php foreach(OJ::permission_list() as $permission):?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="permission[]" value="<?php echo $permission;?>" <?php if ($user->has_permission($permission)):?>checked="checked" <?php endif;?>/> <?php echo __($permission);?>
                            </label>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit"><?php echo(__('admin.user.edit.save')); ?></button>
                        <button class="btn" onclick="history.back()" type="reset"><?php echo(__('admin.user.edit.cancel')); ?></button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-4 well">
        <h3><?php echo(__('admin.user.edit.notice')); ?></h3>
        <ul class="list-group">
            <li class="list-group-item"><?php echo(__('admin.user.edit.cannotmodify')); ?></li>
            <li class="list-group-item"><?php echo(__('admin.user.edit.password')); ?></li>
            <li class="list-group-item"><?php echo(__('admin.user.edit.school')); ?></li>
            <li class="list-group-item"><?php echo(__('admin.user.edit.email')); ?></li>
            <li class="list-group-item"><?php echo(__('admin.user.edit.intro')); ?></li>
        </ul>
        <hr>
        <h3><?php echo(__('admin.user.edit.detail')); ?></h3>
        <div>
            <h4><?php echo(__('admin.user.edit.lastaccess')); ?> <span class="label label-danger"><?php echo($user->accesstime); ?></span></h4>
            <h4><?php echo(__('admin.user.edit.lastip')); ?> <span class="label label-default"><?php echo $user->ip; ?></span></h4>
            <h4><?php echo(__('admin.user.edit.solved')); ?> <span class="label label-success"><?php echo $user->solved; ?></span></h4>
            <h4><?php echo(__('admin.user.edit.submit')); ?> <span class="label label-default"><?php echo $user->submit; ?></span></h4>
        </div>
    </div>
</div>
