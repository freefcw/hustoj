<table class="table table-striped">
    <thead>
    <tr><th>Problem Id</th><th>Title</th><th>Add Date</th><th>Publish</th><th>Deleted</th></tr>
    </thead>
<?php foreach($problem as $p):?>
<tr>
<td><?php echo $p['problem_id'];?></td>
<td><?php echo $p['title'];?><a href="/admin/problem/edit/<?php echo $p['problem_id'];?>" style="float: right;">[EDIT]</a></td>
<td><?php echo OJ::mtime($p['add_date']);?></td>
<td>Public</td>
<td><a id="del-<?php echo $p['problem_id'];?>">Del</a></td>
</tr>
<?php endforeach;?>
</table>