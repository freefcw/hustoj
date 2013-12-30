<?php /* @var Model_Contest $contest */?>
<?php echo(View::factory('contest/nav', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<table style="margin-top: 20px" class="table table-striped">
    <thead>
    <tr>
        <th>Rank</th><th>User</th><th>Solved</th><th>Penalty</th>
        <?php foreach($contest->problem() as $problem): ?>
        <th><?php echo($problem->display_order());?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php $rank = 0; ?>
    <?php foreach($contest->standing() as $team): ?>
    <?php $rank++; ?>
    <tr>
        <td><?php echo $rank;?></td>
        <td><?php echo $team->user_id;?></td>
        <td><?php echo $team->solved;?></td>
        <td><?php echo OJ::contest_time($team->time);?></td>
    <?php for($i = 0; $i < $contest->number_of_problems(); $i++): ?>
        <td>
        <?php if (array_key_exists($i, $team->ac_list)): ?>
        <?php echo OJ::contest_time($team->problem_ac_sec[$i]);?>
        <?php if ($team->problem_wa_count[$i]):?>
        (-<?php echo $team->problem_wa_count[$i];?>)
        <?php endif; ?>
        <?php else:?>
            -/-
        <?php endif;?>
        </td>
    <?php endfor; ?>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
