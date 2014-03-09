<?php
/* @var Model_Contest $contest */
?>
<?php echo(View::factory('contest/header', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<table class="table table-striped statics-problem">
<thead>
    <tr>
        <th></th><?php foreach( OJ::$result as $rt) echo("<th>{$rt}</th>");?><th>TOTAL</th>
    </tr>
</thead>
<tbody>
<?php
    $number_of_problem = $contest->number_of_problems();
    for($index = 0; $index < $number_of_problem; $index++):
    $total = 0;
?>
    <tr>
        <td><?php echo(e::contest_pid($index));?></td>
    <?php foreach(array_keys(OJ::$result) as $result_type):?>
        <td><?php
            if ($result[$index][$result_type])
            {
                echo($result[$index][$result_type]);
                $total += $result[$index][$result_type];
            } else {
                echo '-';
            }
            ?></td>
    <?php endforeach;?>
        <td><?php echo($total);?></td>
    </tr>
<?php endfor;?>
    <tr>
        <td>Total</td>
        <?php $total = 0;
        foreach(array_keys(OJ::$result) as $result_type):?>
            <td><?php
                $total += $result['total'][$result_type];
                echo($result['total'][$result_type]);?></td>
        <?php endforeach;?>
        <td><?php echo($total);?></td>
    </tr>
    </tbody>
</table>
<table class="table table-striped statics-lang">
<thead>
    <tr>
        <?php foreach( OJ::$language as $lang) echo("<th>{$lang}</th>");?>
    </tr>
</thead>
<tbody>
<?php for($index = 0; $index < $number_of_problem; $index++):
    ?>
    <tr>
<?php if (!array_key_exists($index, $language)) $language[$index] = array();?>
<?php foreach(array_keys(OJ::$language) as $result_type):?>
    <td>
        <?php if(array_key_exists($result_type, $language[$index])) echo($language[$index][$result_type]);?>
    </td>
<?php endforeach;?>
    </tr>
<?php endfor;?>
<tr>
    <?php foreach(array_keys(OJ::$language) as $result_type):?>
        <td><?php echo($language['total'][$result_type]);?></td>
    <?php endforeach;?>
</tr>
</tbody>
</table>