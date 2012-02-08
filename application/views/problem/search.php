<h1>Search Result of '<?php echo $search_text;?>' in <?php echo $area?> </h1>

<div class="span9">
      <form class="well form-search" action="/problem/search" method="GET">
        Find <input type="text" name="text" class="input-medium"> IN
        <select name="area" class="input-small"><option value='title'>Title</option><option value="source">Source</option></select>
        <button type="submit" class="btn">Go</button>
      </form>
</div>
<table class="table table-striped">
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
