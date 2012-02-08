<div class="edit-userinfo">
    <h3 class="page-title">Update Imformation</h3>
    <?php if (isset($error) AND ($error != null)): ?>
    <div class="alert-message error err-notice"><p><?php echo $error; ?></p></div>
    <?php endif ?>
    <?php if (isset($tip) AND ($tip != null)): ?>
        <div class="alert-message success err-notice"><p><?php echo $tip; ?></p></div>
        <?php endif ?>
    <form action="/account/setting" method="POST" class="form-horizontal">
        <fieldset>
            <div class="control-group">
            <label class="control-label">User ID:</label>
                <div class="controls"><input type="text" disabled="disabled" value="<?php print $userinfo['user_id'];?>"/></div>
            </div>
            <div class="control-group">
            <label>Nick Name:</label>
                <div class="controls"><input name="nick" type="text" value="<?php print $userinfo['nick'];?>"/></div>
            </div>
            <div class="control-group">
            <label>Current Password:</label>
                <div class="controls"><input data-content="You need input password" data-original-title="Notice" class="pop" id="password" name="password" type="password" value=""/></div>
            </div>
            <div class="control-group">
            <label>New Password:</label>
                <div class="controls"><input id="newpwd" name="newpassword" type="password" value=""/></div>
            </div>
            <div class="control-group">
            <label>Confirm Password:</label>
                <div class="controls"><input id="repwd" data-content="confirm password" data-original-title="Notice" class="pop" name="confirm" type="password" value=""/></div>
            </div>
            <div class="control-group">
            <label>School:</label>
                <div class="controls"><input name="school" type="text" value="<?php print $userinfo['school'];?>"/></div>
            </div>
            <div class="control-group">
            <label>Email:</label>
                <div class="controls"><input name="email" type="text" value="<?php print $userinfo['email'];?>"/></div>
            </div>
        </fieldset>
        <div class="form-actions">
        <input type="submit" value="Save Changes" class="btn-primary" id='submit'/>
        <button type="reset" class="btn">Cancel</button>
        </div>
    </form>
    <script type="text/javascript">
        $(function(){
           $("input.pop").popover({
               trigger: 'focus',
               offset: 10
           })
        });
        $(function(){
            $('#submit').click(function(){
                pwd = $('#password').val();
                if (pwd.length == 0) {
                    $('#password').popover('show');
                    return false;
                }
                if ($('#newpwd').val() != $('#repwd').val()){
                    //$('#newpwd').popover('show');
                    $('#repwd').popover({
                        content: 'password is not the same',
                        offset: 10,
                        trigger: 'focus'
                    }).popover('show');
                    //$('#repwd').popover('show');
                    return false;
                }
                return true;
            })
        });
    </script>
</div>