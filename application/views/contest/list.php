<table class="table table-striped">
	<thead>
		<tr><th>ID</th><th>Title</th><th>Status</th><th>Private</th></tr>
	</thead>
	<tbody>
<?php foreach($list as $c): ?>
<tr>
<td><?php echo($c['contest_id']);?></td>
<td><?php echo(html::anchor("/contest/show/{$c['contest_id']}", $c['title']));?></td>
<td><?php echo($c['end_time']);?></td>
<td><?php echo(OJ::private_value($c['private']));?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<ul class="pager" style="margin-left: 15%; margin-right: 15%">
    <?php $page = Request::$current->query('page');?>
    <?php if ($page != 1):?>
    <?php
        $params = Request::$current->query();
        $params['page'] = $page - 1;
        $query_param = URL::query($params);
    ?>
        <li class="previous"><?php echo html::anchor("/contest/{$query_param}", '&larr; Newer');?></li>
    <?php endif;?>
    <?php if ($page < $total): ?>
    <?php
        $params['page'] = $page + 1;
        $query_param = URL::query($params);
    ?>
    <li class="next"><?php echo html::anchor("/contest/{$query_param}", 'Older &rarr;');?></li>
    <?php endif;?>
</ul>