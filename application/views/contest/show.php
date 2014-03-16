<?php /* @var Model_Contest $contest */?>
<?php echo(View::factory('contest/header', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<table class="table table-striped">
<thead>
    <tr>
        <th><?php echo(__('contest.show.id')); ?></th>
        <th><?php echo(__('contest.show.title')); ?></th>
    </tr>
</thead>
<tbody>
<?php foreach($contest->problem() as $p):?>
<?php
    $url = sprintf('/contest/%s/problem/%s', $cid, $p->num);
?>
    <tr>
        <td><?php echo($p->display_order());?></td>
        <td><a href="<?php e::url($url);?>"><?php echo($p->title());?></a></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
