<table class="table table-striped">
<thead>
    <tr><th>ID</th><th>Title</th><th>Status</th><th>Private</th><th>OP</th></tr>
</thead>
<tbody>
<?php /* @var Model_Contest[] $contest_list */ foreach($contest_list as $contest):?>
    <tr>
        <td><?php echo $contest['contest_id'];?></td>
        <td><a href="<?php e::url("/contest/show/{$contest->contest_id}");?>" title="view"><?php echo($contest->title);?></a></td>
        <td><span><?php echo($contest->start_time);?></span> <br/>  <span><?php echo($contest->end_time);?></span></td>
        <td class="capitalize">
            <?php if ($contest->is_private()):?>
                <a href="<?php e::url("/admin/contest/member/{$contest->contest_id}");?>">Member</a>
            <?php else:?>
                <?php echo OJ::private_value($contest['private']);?>
            <?php endif;?>
        </td>
        <td><a class="edit-link" href="<?php e::url("/admin/contest/edit/{$contest['contest_id']}");?>">[Edit]</a></td>
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
            var url = '<?php e::url('/admin/problem/defunct');?>'
            $.getJSON(url, {'problem_id': problem_id}, function(response){
                console.log(response);
                $('#defunct-' + problem_id).html(response.result)
            })
        }
    });
</script>

<?php echo(View::factory('common/pager', array('base_url' => '/admin/contest', 'total' => $total)));?>