<table class="table table-striped">
    <thead>
        <tr><th>User ID</th><th>Nick</th><th>Solved</th><th>Submit</th><th>Ratio</th><th>OP</th></tr>
    </thead>
    <tbody>
    <?php foreach($user_list as $u):?>
        <tr>
            <td><?php echo HTML::anchor("/u/{$u['user_id']}", $u['user_id']); ?></td>
            <td><?php echo HTML::chars($u['nick']); ?></td>
            <td><?php echo $u['solved']; ?></td>
            <td><?php echo $u['submit']; ?></td>
            <td><?php if($u['solved'] == 0):?>
            0.00%
            <?php else: ?>
            <?php echo sprintf( "%.02lf%%", $u['solved']/$u['submit'] * 100); ?>
            <?php endif; ?>
            </td>
            <td><a class="edit-link" href="<?php e::url("/admin/user/edit/{$u['user_id']}");?>">[Edit]</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo(View::factory('common/pager', array('base_url' => '/admin/user', 'total' => $total)));?>