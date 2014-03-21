<table class="table table-striped">
<thead>
<tr>
    <th><?php echo(__('admin.contest.list.id')); ?></th>
    <th><?php echo(__('admin.contest.list.title')); ?></th>
    <th><?php echo(__('admin.contest.list.status')); ?></th>
    <th><?php echo(__('admin.contest.list.type')); ?></th>
    <th><?php echo(__('admin.contest.list.op')); ?></th>
</tr>
</thead>
<tbody>
<?php /* @var Model_Contest[] $contest_list */
foreach($contest_list as $contest):?>
    <tr>
        <td><?php echo $contest['contest_id'];?></td>
        <td><a href="<?php e::url("/contest/show/{$contest->contest_id}");?>" title="view"><?php echo($contest->title);?></a></td>
        <td><span><?php echo($contest->start_time);?></span> <br/>  <span><?php echo($contest->end_time);?></span></td>
        <td class="capitalize">
            <?php if ($contest->is_private()):?>
                <a href="<?php e::url("/admin/contest/member/{$contest->contest_id}");?>"><?php echo __(e::private_value($contest['private'])); ?></a>
            <?php else:?>
                <?php echo __(e::private_value($contest['private']));?>
            <?php endif;?>
        </td>
        <td><a class="edit-link" href="<?php e::url("/admin/contest/edit/{$contest['contest_id']}");?>"><?php echo(__('admin.contest.list.edit')); ?></a></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo(View::factory('common/pager', array('base_url' => '/admin/contest', 'total' => $total)));?>
