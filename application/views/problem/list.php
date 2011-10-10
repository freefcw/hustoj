<?php echo html::anchor('/problem/ramdom', 'Random'); ?>
<span class="pagination">
<?php for($i = 1; $i <= $pages; $i++): ?>
<?php if($i == $page_id):?>
<?php echo $i;?>
<?php else: ?>
<?php echo html::anchor("/problem/list/{$i}", $i);?>
<?php endif;?>
<?php endfor;?>
</span>
<?php echo Form::open('/problem/search', array('method' => 'get', 'class'=>'search'));?>
<?php echo Form::label('text', 'Search:');?>
<?php echo Form::input('text');?> in
<?php echo Form::select('area', array('title' => 'Title', 'source'=>'Source'), 'Title'); ?>
<?php echo Form::submit(NULL, 'Search');?>
<?php echo Form::close();?>
<table>
	<thead>
		<tr><th>ID</th><th>TITLE</th><th>Ratio(AC/Submit)</th></tr>
	</thead>
	<tbody>
<?php foreach($problemlist as $p): ?>
<tr><td class="pid"><?php echo $p->problem_id; ?></td>
<td class="ptitle"><?php echo html::anchor("/problem/show/{$p->problem_id}", $p->title );?></td>
<td><?php echo $p->accepted; ?>/<?php echo $p->submit; ?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
