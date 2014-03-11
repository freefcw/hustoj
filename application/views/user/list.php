<table class="table table-striped">
	<thead>
		<tr><th>Rank</th><th>User ID</th><th>Nick</th><th>Solved</th><th>Submit</th><th>Ratio</th></tr>
	</thead>
	<tbody>
<?php $rank = ($page - 1) * $per_page; /* @var Model_User[] $users */ ?>
<?php foreach($users as $u):?>
<?php $rank = $rank + 1;?>
    <tr>
        <td class="rank"><?php echo($rank) ?></td>
        <td><?php echo HTML::anchor("/u/{$u->user_id}", $u->user_id); ?></td>
        <td><?php echo HTML::chars($u->nick); ?></td>
        <td><?php echo($u->solved); ?></td>
        <td><?php echo($u->submit); ?></td>
        <td><?php echo($u->ratio_of_accept()) ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php
function gen_url($page=NULL)
{
    static $base_url = '/rank/user';
    if ($base_url)
        return sprintf('%s/%s', $base_url, $page);
    return $base_url;
}?>
<ul class="pager rank-pager">
    <?php if ($page != 1): ?>
        <li><?php echo HTML::anchor(gen_url(), 'Top');?></li>
        <li><?php echo HTML::anchor(gen_url($page - 1), 'Previous');?></li>
    <?php endif; ?>
    <li class="reflesh"><?php echo HTML::anchor(gen_url($page), 'Reflesh');?></li>
    <?php if ($page != $total_page): ?>
        <li><?php echo HTML::anchor(gen_url($page + 1), 'Next');?></li>
        <li><?php echo HTML::anchor(gen_url($total_page), 'Last');?></li>
    <?php endif; ?>
</ul>
