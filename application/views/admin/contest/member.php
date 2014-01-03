<table class="table table-striped">
    <thead>
    <tr>
        <th>User Id</th>
        <th>Del</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user_id): ?>
    <tr>
        <td><?php echo $user_id;?></td>
        <td><a href="#" class="x" data="<?php echo $user_id;?>">[X]</a></td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    function removeUser(e) {
//        $(this).parent().parent().attr('class', 'shadow');
        $(this).parent().parent().remove();
        var uid = $(this).attr('data');
        var cid = <?php echo $contest['contest_id'];?>;
        $.ajax({
            type: 'post',
            url: '/admin/contest/removeuser/',
            data: {'cid': cid, 'uid': uid},
            success: function (data, textStatus, jqXHR){
                alert(data.ok);
            },
            dataType: 'json'
        });
    }

    $(function () {
        $("table  td a.x").click(removeUser);
    })
</script>
<form action="/admin/contest/member/<?php echo $contest['contest_id'];?>" method="post" class="form-horizontal">
    <fieldset>
        <legend>Add Member</legend>
        <div class="form-group">
            <label class="control-label col-sm-2" for="content">User List</label>
            <div class="col-sm-10">
                <textarea rows="10" cols="10" class="form-control" id="content" name="content"></textarea>
                <p class="help-block">each line is a user id.</p>
            </div>
    </div>
    </fieldset>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="btn btn-primary" type="submit">Save!</button>
        </div>
    </div>
</form>