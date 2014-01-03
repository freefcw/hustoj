<?php /* @var Model_User $user */?>
<div class="row">
    <div class="col-sm-8">
        <form class="form-horizontal" action="/admin/user/edit/<?php echo $user['user_id']; ?>" method="POST">
            <fieldset>
                <legend>Basic Information</legend>
                <div class="form-group">
                    <label for="user_id" class="control-label col-sm-2">User ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="user_id" name="user_id" readonly="readonly" class="form-control disabled" value="<?php echo $user['user_id']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nick" class="control-label col-sm-2">Nick Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="nick" name="nick" class="form-control" value="<?php echo $user['nick']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password">
                        <p class="help-block">If you don't need change password, leave here and blow blank.</p>
                    </div>
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="password" class="form-control" name="repassword">
                        <p class="help-block">Repeat.</p>
                    </div>
                </div>
                <legend>Contact Information</legend>
                <div class="form-group">
                    <label for="school" class="control-label col-sm-2">School</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="school" id="school" value="<?php echo $user['school']; ?>">
                        <p class="help-block"></p>
                    </div>
                    <label for="email" class="control-label col-sm-2">Email</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="textarea" class="control-label col-sm-2">Introduce</label>

                    <div class="col-sm-10">
                        <textarea cols="50" rows="3" id="textarea" class="form-control" name="intro">
                            <?php echo($user['intro']);?></textarea>
                    </div>
                </div>
                <legend>Other Information</legend>
                <div class="form-group">
                    <label for="disabled" class="control-label col-sm-2">Disable User</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="disabled" name="disabled">
                            <option value="0"
                                    <?php if (array_key_exists('disabled', $user) and $user['disabled'] == false): ?>selected="selected"<?php endif; ?>>
                                enabled
                            </option>
                            <option value="1"
                                    <?php if (array_key_exists('disabled', $user) and $user['disabled'] == true): ?>selected="selected"<?php endif; ?>>
                                disabled
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <button class="btn" onclick="history.back()" type="reset">Cancel</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-4 well">
        <h3>Notice</h3>
        <ul class="list-group">
            <li class="list-group-item">User name can't modify</li>
            <li class="list-group-item">Password</li>
            <li class="list-group-item">School</li>
            <li class="list-group-item">Email</li>
            <li class="list-group-item">Introduction</li>
        </ul>
        <hr>
        <h3>Detail</h3>
        <div>
            <h4>Last time <span class="label label-danger"><?php echo($user->accesstime); ?></span></h4>
            <h4>Last ip <span class="label label-default"><?php echo $user->ip; ?></span></h4>
            <h4>Solved <span class="label label-success"><?php echo $user->solved; ?></span></h4>
            <h4>Submit <span class="label label-default"><?php echo $user->submit; ?></span></h4>
        </div>
    </div>
</div>