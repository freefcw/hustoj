<div id="summary">
<dl>
<dt>Total Submissions</dt>
<dd><?php echo $summary['total'];?></dd>
<dt>Submitted Users</dt>
<dd><?php echo $summary['submit_user'];?></dd>
<dt>Solved User</dt>
<dd><?php echo $summary['ac_user'];?></dd>
<?php foreach($summary['more'] as $key=>$value):?>
<dt><?php print OJ::$status[$key];?></dt>
<dd><?php print $value;?></dd>
<?php endforeach;?>
</dl>
<table class="best-solution table table-striped">
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
			<td><?php print $s['solution_id'];?></td>
            <td><?php print $s['memory'];?>KB</td>
            <td><?php print $s['time'];?>MS</td>
            <td><a href="/u/<?php print $s['user_id'];?>"><?php print $s['user_id'];?></a></td>
            <td><?php print OJ::lang($s['language']);?></td>
            <td><?php echo($s['in_date']);?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>