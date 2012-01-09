<h1>Search Result of '<?php echo $search_text;?>' in <?php echo $area?> </h1>
<?php echo Form::open('/problem/search', array('method' => 'get', 'class'=>'search'));?>
<?php echo Form::label('text', 'Search:');?>
<?php echo Form::input('text');?>
<?php echo Form::select('area', array('title' => 'Title', 'source'=>'Source'), 'Title'); ?>
<?php echo Form::submit(NULL, 'Search');?>
<?php echo Form::close();?>
<table>
	<thead>
		<tr><th>ID</th><th>TITLE</th><th>Ratio(AC/Submit)</th></tr>
	</thead>
	<tbody>
<?php foreach($problemlist as $p): ?>
<tr><td class="pid"><?php echo $p['problem_id']; ?></td>
<td class="ptitle"><?php echo html::anchor("/problem/show/{$p['problem_id']}", $p['title']);?>
	<?php if ($p['source'] != ''): ?>
		<span> - <?php echo $p['source'];?></span>
	<?php endif;?>
	</td>
<td><?php echo $p['accepted']; ?>/<?php echo $p['submit']; ?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
