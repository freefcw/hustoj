<table class="table table-striped">
    <thead>
    <tr>
        <th>User Id</th>
        <th>Del</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['user_id'];?></td>
        <td><a href="#">[X]</a></td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form action="/admin/contest/listuser/<?php echo $contest['contest_id'];?>" method="post" class="form-horizontal">
    <fieldset>
        <legend>Add Member</legend>
    <div class="control-group">
        <label class="control-label" for="content">User List</label>
        <div class="controls">
            <textarea rows="10" cols="10" class="span6" id="content" name="content"></textarea>
            <p class="help-block">each line is a user id.</p>
        </div>
    </div>
    </fieldset>
    <div class="form-actions">
        <button class="btn btn-primary" type="submit">Save!</button>
    </div>
</form>