<table class="table table-striped">
<thead>
    <tr><th>ID</th><th>Title</th><th>Status</th><th>Private</th></tr>
</thead>
<tbody>
<?php /* @var Model_Contest[] $contest_list */ foreach($contest_list as $contest):?>
    <tr>
        <td><?php echo $contest['contest_id'];?><a class="edit-link" href="/admin/contest/edit/<?php echo $contest['contest_id'];?>" style="float:right;">[EDIT]</a></td>
        <td><?php echo html::anchor("/contest/show/{$contest->contest_id}", $contest->title);?></td>
        <td><?php echo($contest->start_time);?> <br/> <?php echo($contest->end_time);?></td>
        <td class="capitalize">
            <a href="/admin/contest/changeprivate/<?php echo OJ::private_value($contest->private);?>"><?php echo OJ::private_value($contest['private']);?></a>
            <?php if ($contest->is_private()):?>| <a href="/admin/contest/member/<?php echo $contest->contest_id;?>">Edit Member</a><?php endif;?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
    $('a.dp').click(function(){
        var problem_id = $(this).attr('data-value');
        console.log(problem_id);
        var sure = confirm('Are u sure change this problem status?');
        if (sure)
        {
            var url = '/admin/problem/defunct'
            $.getJSON(url, {'problem_id': problem_id}, function(response){
                console.log(response);
                $('#defunct-' + problem_id).html(response.result)
            })
        }
    });
</script>