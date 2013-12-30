<?php
/* @var Model_Contest $contest */

?>
<?php echo View::factory('contest/nav', array('title' => $title, 'cid' => $cid, 'contest' => $contest));?>

<table style="width: 70%;margin-top: 30px;float: left;" class="table table-striped">
    <thead>
    <tr><th></th><?php foreach(OJ::$result as $rt) echo "<th>{$rt}</th>";?></tr>
    </thead>
    <tbody>
<?php for($problem_order = 0; $problem_order < $contest->number_of_problems(); $problem_order++):?>
    <tr>
        <td><?php echo(OJ::contest_pid($problem_order));?></td>
    <?php if (!array_key_exists($problem_order, $result)) $result[$problem_order] = array();?>
    <?php foreach(array_keys(OJ::$result) as $result_type):?>
        <td><?php if(array_key_exists($result_type, $result[$problem_order])) echo $result[$problem_order][$result_type]; else echo '0'?></td>
    <?php endforeach;?>
    </tr>
<?php endfor;?>
    </tbody>
</table>
<table style="width: 25%;margin-top: 30px; border-left: silver solid 1px" class="table table-striped">
    <thead>
    <tr><?php foreach(OJ::$language as $lang) echo "<th>{$lang}</th>";?></tr>
    </thead>
    <tbody>
<?php for($problem_order = 0; $problem_order < $contest->number_of_problems(); $problem_order++):?>
    <tr>
    <?php if (!array_key_exists($problem_order, $language)) $language[$problem_order] = array();?>
    <?php foreach(array_keys(OJ::$language) as $result_type):?>
        <td><?php if(array_key_exists($result_type, $language[$problem_order])) echo $language[$problem_order][$result_type]; else echo '0'?></td>
    <?php endforeach;?>
    </tr>
<?php endfor;?>
    </tbody>
</table>