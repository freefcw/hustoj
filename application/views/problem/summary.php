<dl>
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
