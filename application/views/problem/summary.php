<dl id="summary">
<dt>Total Submissions</dt>
<dd><?php echo $summary['total'];?><dd>
<dt>Submitted Users</dt>
<dd><?php echo $summary['submit_user'];?><dd>
<dt>Solved User</dt>
<dd><?php echo $summary['ac_user'];?><dd>
<?php foreach($summary['more'] as $key=>$value):?>
<dt><?php echo $key;?></dt><dd><?php echo $value;?></dd>
<?php endforeach;?>
</dl>
<table>
	<thead>
		<tr>
			<th>Rank</th><th>RunID</th><th>Memory</th><th>Time</th><th>Language</th><th>Code Length</th><th>Time</th>
		</tr>
	<tbody>
		<?php $rank = 0;?>
		<?php foreach($jstatus as $s): ?>
		<?php $rank = $rank + 1; ?>
		<tr>
			<td><?php echo $rank; ?>
			<td><?php echo $s->runid;?>
