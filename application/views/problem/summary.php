<div id="summary">
<dl>
<dt>Total Submissions</dt>
<dd><?php echo $summary['total'];?></dd>
<dt>Submitted Users</dt>
<dd><?php echo $summary['submit_user'];?></dd>
<dt>Solved User</dt>
<dd><?php echo $summary['ac_user'];?></dd>
<?php foreach($summary['more'] as $st):?>
<dt><?php print OJ::$status[$st->result];?></dt>
<dd><?php print $st->total;?></dd>
<?php endforeach;?>
</dl>
<table class="best-solution">
	<thead>
		<tr>
			<th>Rank</th><th>RunID</th><th>Momery</th><th>Time</th><th>User</th><th>Language</th><th>Submit Time</th>
		</tr>
    </thead>
	<tbody>
		<?php $rank = 0;?>
		<?php foreach($solutions as $s): ?>
		<?php $rank = $rank + 1; ?>
		<tr>
			<td><?php print $rank; ?></td>
			<td><?php print $s->solution_id;?>(<?php print $s->att;?>)</td>
            <td><?php print $s->memory;?>KB</td>
            <td><?php print $s->time;?>MS</td>
            <td><a href="/user/<?php print $s->user_id;?>"><?php print $s->user_id;?></a></td>
            <td><?php print OJ::lang($s->language);?></td>
            <td><?php print $s->in_date;?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>