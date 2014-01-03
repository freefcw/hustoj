<ul class="pagination problem-pagination">
<?php for($i = 1; $i <= $pages; $i++): ?>
    <li<?php if($i == Request::$current->param('id')):?> class="active"<?php endif;?>><a href="/problem/list/<?php echo($i);?>"><?php echo($i);?></a></li>
<?php endfor;?>
</ul>
<div class="problem-search">
<?php echo(View::factory('problem/searchform'));?>
</div>
<table class="table table-striped">
<thead>
    <tr><th style="width: 5%">ID</th><th style="width: 80%">TITLE</th><th style="width: 10%">Ratio(AC/Submit)</th></tr>
</thead>
<tbody>
<?php /* @var Model_Problem[] $problemlist */ ?>
<?php foreach($problemlist as $problem): ?>
    <tr>
        <td class="pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo(html::anchor("/problem/show/{$problem->problem_id}", $problem->title));?></td>
        <td><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
