<div class="edit-userinfo">
<h3 class="page-title"><?php echo(__('user.edit.user_edit')); ?></h3>
    <form action="<?php e::url(Request::current()->uri());?>" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <label class="control-label col-sm-5" for="user_id"><?php echo(__('user.register.username')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" type="text" id="user_id" disabled="disabled" value="<?php print $userinfo['user_id'];?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="nick"><?php echo(__('user.register.nick')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" id="nick" name="nick" type="text" value="<?php print $userinfo['nick'];?>"/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="password"><?php echo(__('user.edit.current_password')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" data-content="<?php echo(__('user.edit.need_password')); ?>" data-original-title=""
                       data-container="body" data-placement="right"  data-toggle="popover" id="password" name="password" type="password" value=""/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="newpwd"><?php echo(__('user.edit.new_password')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" id="newpwd" name="newpassword" type="password" value=""/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="repwd"><?php echo(__('user.register.confirm')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" id="repwd" name="confirm" type="password" value=""/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="school"><?php echo(__('user.register.school')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" name="school" id="school" type="text" value="<?php print $userinfo['school'];?>"/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="email"><?php echo(__('user.register.email')); ?></label>
            <div class="col-sm-7">
                <input class="form-control" name="email" id="email" type="email" value="<?php print $userinfo['email'];?>"/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="locale"><?php echo(__('user.register.locale')); ?></label>
            <div class="col-sm-7">
                <select class="form-control" name="locale" id="locale" type="locale">
                <?php $selected = $userinfo['locale']; ?>
                <?php foreach(I18n::supported_lang() as $value => $info): ?>
                    <option value="<?php echo($value);?>" <?php if ($selected==$value) echo('selected'); ?>>
                        <?php echo($info['name']);?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="theme"><?php echo(__('user.register.theme')); ?></label>
            <div class="col-sm-7">
                <select class="form-control" name="theme" id="theme" type="theme">
                <?php $selected = $userinfo['theme']; ?>
                <?php foreach(Theme::supported_themes() as $value => $name): ?>
                    <option value="<?php echo($value);?>" <?php if ($selected==$value) echo('selected'); ?>>
                        <?php echo($name);?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <input type="submit" value="<?php echo(__('user.edit.save_changes')); ?>" class="btn-primary btn" id='submit'/>
            </div>
        </div>
    </form>
    <script type="text/javascript" data-turbolinks-eval="true">
        $(function(){
           $("input.pop").popover({
               trigger: 'focus',
               offset: 10
           })
        });
        $(function(){
            $('#submit').click(function(){
                var pwd = $('#password').val();
                if (pwd.length == 0) {
                    $('#password').popover('show');
                    return false;
                }
                if ($('#newpwd').val() != $('#repwd').val()){
                    $('#repwd').popover({
                        container: 'body',
                        content: '<?php echo(__('user.edit.error_not_same')); ?>',
                        offset: 10,
                        trigger: 'focus'
                    }).popover('show');
                    return false;
                }
                return true;
            })
        });
    </script>
</div>
