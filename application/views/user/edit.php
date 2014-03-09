<div class="edit-userinfo">
    <h3 class="page-title">Update Imformation</h3>
    <?php if (isset($error) AND ($error != null)): ?>
    <div class="alert-error alert"><p><?php echo $error; ?></p></div>
    <?php endif ?>
    <?php if (isset($tip) AND ($tip != null)): ?>
    <div class="alert-success alert"><p><?php echo $tip; ?></p></div>
    <?php endif ?>
    <form action="<?php e::url(Request::current()->uri());?>" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <label class="control-label col-sm-5" for="user_id">User ID</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" id="user_id" disabled="disabled" value="<?php print $userinfo['user_id'];?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="nick">Nick Name</label>
            <div class="col-sm-7">
                <input class="form-control" id="nick" name="nick" type="text" value="<?php print $userinfo['nick'];?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="password">Current Password</label>
            <div class="col-sm-7">
                <input class="form-control" data-content="You need input password" data-original-title=""
                       data-container="body" data-placement="right"  data-toggle="popover" id="password" name="password" type="password" value=""/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="newpwd">New Password</label>
            <div class="col-sm-7">
                <input class="form-control" id="newpwd" name="newpassword" type="password" value=""/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="repwd">Confirm Password</label>
            <div class="col-sm-7">
                <input class="form-control" id="repwd" name="confirm" type="password" value=""/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="school">School</label>
            <div class="col-sm-7">
                <input class="form-control" name="school" id="school" type="text" value="<?php print $userinfo['school'];?>"/>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-5" for="email">Email</label>
            <div class="col-sm-7">
                <input class="form-control" name="email" id="email" type="email" value="<?php print $userinfo['email'];?>"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <input type="submit" value="Save Changes" class="btn-primary btn" id='submit'/>
                <button type="reset" class="btn">Cancel</button>
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
                        content: 'password is not the same',
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