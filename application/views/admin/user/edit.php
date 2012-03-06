<h2>Edit User</h2>
<div class="row">
    <div class="span8">
      <form class="form-horizontal" action="/admin/user/edit/<?php echo $user['user_id'];?>" method="POST">
        <fieldset>
          <legend>Basic Information</legend>
          <div class="control-group">
            <label for="user_id" class="control-label">User ID</label>
            <div class="controls">
              <input type="text" id="user_id" name="user_id" readonly="readonly" class="input-xlarge disabled" value="<?php echo $user['user_id'];?>">
            </div>
          </div>
          <div class="control-group">
          <label for="nick" class="control-label">Nick Name</label>
          <div class="controls">
            <input type="text" id="nick" name="nick" class="input-xlarge" value="<?php echo $user['nick'];?>">
          </div>
          </div>
          <div class="control-group">
              <label for="password" class="control-label">Password</label>
              <div class="controls">
                <input type="password" class="input-xlarge" name="password" id="password">
                <p class="help-block">If you don't need change password, leave here and blow blank.</p>
              </div>
              <div class="controls">
                <p></p>
                <input type="password" class="input-xlarge" name="repassword">
                <p class="help-block">Repeat.</p>
              </div>
          </div>
            <legend>Contact Information</legend>
            <div class="control-group">
                <label for="school" class="control-label">School</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="school" id="school" value="<?php echo $user['school'];?>">
                  <p class="help-block"></p>
                </div>
                <label for="email" class="control-label">Email</label>
                   <div class="controls">
                  <input type="text" class="input-xlarge" name="email" id="email" value="<?php echo $user['email'];?>">
                  <p class="help-block"></p>
                </div>
            </div>

          <div class="control-group">
            <label for="textarea" class="control-label">Introduce</label>
            <div class="controls">
              <textarea cols="50" rows="3" id="textarea" class="span6" name="intro"><?php if(array_key_exists('intro', $user)) echo $user['intro'];?></textarea>
            </div>
          </div>
            <legend>Other Information</legend>
            <div class="control-group">
                <label for="disabled" class="control-label">Disable User</label>
                <div class="controls">
                    <select id="disabled" name="disabled">
                        <option value="0" <?php if (array_key_exists('disabled', $user) and $user['disabled'] == false): ?>selected="selected"<?php endif;?>>enabled</option>
                        <option value="1" <?php if (array_key_exists('disabled', $user) and $user['disabled'] == true): ?>selected="selected"<?php endif;?>>disabled</option>
                    </select>
                </div>
            </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
              <button class="btn" onclick="history.back()" type="reset">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="span4">
      <h3>Notice</h3>
      <p>Here is a comment</p>
      <ul>
        <li>User name can't modify</li>
        <li>Password</li>
        <li>School</li>
        <li>Email</li>
        <li>Introduction</li>
      </ul>
      <hr>
      <h3>Detail</h3>
    <dl>
        <dt>Last accesss time</dt>
        <dd><?php echo OJ::mtime($user['access_time']);?></dd>
        <dt>Last access ip</dt>
        <dd><?php echo $user['ip'];?></dd>
        <dt>Total Submit</dt>
        <dd><?php echo $user['submit'];?></dd>
        <dt>Total Solved</dt>
        <dd><?php echo $user['solved'];?></dd>
    </dl>

    </div>
  </div>