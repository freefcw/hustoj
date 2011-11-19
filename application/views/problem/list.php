<div class="pagination" style="width: 200px;margin-left: auto;margin-right: auto;"><ul>
<?php for($i = 1; $i <= $pages; $i++): ?>
<?php if($i == $page_id):?>
<li class="active"><?php echo html::anchor("/problem/list/{$i}", $i, array('class' => 'active'));?></li>
<?php else: ?>
<li><?php echo html::anchor("/problem/list/{$i}", $i);?></li>
<?php endif;?>
<?php endfor;?>
</ul></div>
<?php echo Form::open('/problem/search', array('method' => 'get', 'class'=>'search'));?>
<?php echo Form::label('text', 'Find ', array("class" => ""));?>&nbsp;
<?php echo Form::input('text');?>&nbsp;in&nbsp;<?php echo Form::select('area', array('title' => 'Title', 'source'=>'Source'), 'Title'); ?>
 <?php echo Form::submit(NULL, 'Search', array('class'=>'btn'));?> <?php echo html::anchor('/problem/ramdom', 'Random a problem?', array('class'=>'btn primary')); ?>
<?php echo Form::close();?>
<table class="zebra-striped">
	<thead>
		<tr><th style="width: 5%">ID</th><th style="width: 80%">TITLE</th><th style="width: 10%">Ratio(AC/Submit)</th></tr>
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
