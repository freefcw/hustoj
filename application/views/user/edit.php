<div class="edit-userinfo">
    <h3 class="page-title">Update Imformation</h3>
    <form action="/account/setting" method="POST">
        <fieldset>
            <label><span>User ID:</span><input type="text" disabled="disabled" value="<?php print $userinfo->user_id;?>"/></label>
            <label><span>Nick Name:</span><input name="nick" type="text" value="<?php print $userinfo->nick;?>"/></label>
            <label><span>Current Password:</span><input data-content="You need input password" data-original-title="Notice" class="pop" id="password" name="password" type="password" value=""/></label>
            <label><span>New Password:</span><input id="newpwd" name="newpassword" type="password" value=""/></label>
            <label><span>Confirm Password:</span><input id="repwd" data-content="confirm password" data-original-title="Notice" class="pop" name="confirm" type="password" value=""/></label>
            <label><span>School:</span><input name="school" type="text" value="<?php print $userinfo->school;?>"/></label>
            <label><span>Email:</span><input name="email" type="text" value="<?php print $userinfo->email;?>"/></label>
        </fieldset>
        <input type="submit" value="Update" class="btn" id='submit'/>
    </form>
    <script type="text/javascript" src="http://twitter.github.com/bootstrap/1.4.0/bootstrap-twipsy.js" ></script>
    <script type="text/javascript" src="http://twitter.github.com/bootstrap/1.4.0/bootstrap-popover.js" ></script>
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