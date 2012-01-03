<div class="edit-userinfo">
    <h3 class="page-title">Update Imformation</h3>
    <form action="/account/setting" method="POST">
        <fieldset>
            <label><span>User ID:</span><input type="text" disabled="disabled" value="<?php print $userinfo->user_id;?>"/></label>
            <label><span>Nick Name:</span><input type="text" value="<?php print $userinfo->nick;?>"/></label>
            <label><span>School:</span><input type="text" value="<?php print $userinfo->school;?>"/></label>
            <label><span>Email:</span><input type="text" value="<?php print $userinfo->email;?>"/></label>
        </fieldset>
        <input type="submit" value="Submit" class="btn"/>
    </form>
</div>