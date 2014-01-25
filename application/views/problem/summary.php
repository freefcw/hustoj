<div class="row">
<div class="col-sm-3">
<ul class="nav nav-pills nav-stacked">
    <li><a>Total Submissions<span class="badge pull-right"><?php echo($summary['total']);?></span></a></li>
    <li><a>Submitted Users<span class="badge pull-right"><?php echo($summary['submit_user']);?></span></a></li>
    <li><a>Solved User<span class="badge pull-right"><?php echo($summary['ac_user']);?></span></a></li>
    <?php foreach($summary['more'] as $key=>$value):?>
        <li>
            <a><?php print OJ::$status[$key];?><span class="badge pull-right"><?php print $value;?></span></a>
        </li>
    <?php endforeach;?>
</ul>
</div>
<div class="col-sm-9">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Rank</th><th>RunID</th><th>Momery</th><th>Time</th><th>User</th><th>Language</th><th>Submit Time</th>
		</tr>
    </thead>
	<tbody>
		<?php $rank = 0;?>
		<?php foreach($solutions as $item): ?>
		<?php $rank = $rank + 1; ?>
		<tr>
			<td><?php print $rank; ?></td>
			<td><?php print $item['solution_id'];?></td>
            <td><?php print $item['memory'];?>KB</td>
            <td><?php print $item['time'];?>MS</td>
            <td><a href="/u/<?php print $item['user_id'];?>"><?php print $item['user_id'];?></a></td>
            <td><?php print OJ::lang($item['language']);?></td>
            <td><?php echo($item['in_date']);?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>