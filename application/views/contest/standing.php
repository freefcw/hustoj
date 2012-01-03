<h3 class="page-title">Contest Standing</h3>
<?php echo View::factory('contest/nav');?>
<table style="margin-top: 20px">
    <thead>
    <tr>
        <th>Rank</th><th>User</th><th>Solved</th><th>Penalty</th>
        <?php for($i = 1; $i <= $p_count; $i++): ?>
        <th><?php echo OJ::contest_pid($i);?></th>
        <?php endfor; ?>
    </tr>
    </thead>
    <tbody>
    <?php $rank = 0; ?>
    <?php foreach($standing as $team): ?>
    <?php $rank++; ?>
    <tr>
        <td><?php echo $rank;?></td><td><?php echo $team->user_id;?></td><td><?php echo $team->solved;?></td><td><?php echo OJ::contest_time($team->time);?></td>
        <?php for($i = 1; $i <= $p_count; $i++): ?>
<td>    <?php if (array_key_exists($i, $team->ac_list)) echo OJ::contest_time($team->p_ac_sec[$i]), '(-', $team->p_wa_count[$i],')'; else echo '-';?>
</td>
        <?php endfor; ?>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
