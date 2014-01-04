<?php /* @var Model_Contest $contest */?>
<?php echo(View::factory('contest/nav', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<table class="table table-striped">
<thead>
    <tr><th>ID</th><th>Title</th></tr>
</thead>
<tbody>
<?php foreach($contest->problem() as $p):?>
<?php
    $url = sprintf('/contest/%s/problem/%s', $cid, $p->num);
?>
    <tr>
        <td><?php echo($p->display_order());?></td>
        <td><a href="<?php echo($url);?>"><?php echo($p->title());?></a></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>