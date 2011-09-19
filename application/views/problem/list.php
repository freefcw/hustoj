<?php for($i = 1; $i <= $pages; $i++): ?>
<span class="pagination">
<?php if($i == $page_id):?>
<?php echo $i;?>
<?php else: ?>
<?php echo html::anchor("/problem/list/{$i}", $i);?>
<?php endif;?>
</span>
<?php endfor;?>

<table>
<?php foreach($problemlist as $p): ?>
<tr><td class="pid"><?php echo $p->problem_id; ?></td>
<td class="ptitle"><?php echo html::anchor("/problem/show/{$p->problem_id}", $p->title );?></td>
<td><?php echo $p->accepted; ?></td>
<td><?php echo $p->submit; ?></td>
</tr>
<?php endforeach;?>
</table>
