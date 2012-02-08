<?php echo View::factory('contest/nav');?>

<table style="width: 70%;margin-top: 30px;float: left;">
    <thead>
    <tr><th></th><?php foreach(OJ::$result as $rt) echo "<th>{$rt}</th>";?></tr>
    </thead>
    <tbody>
<?php for($i = 0; $i < $problem_count; $i++):?>
    <tr><td><?php echo OJ::contest_pid($i);?></td>
        <?php if (!array_key_exists($i, $result)) $result[$i] = array();?>
        <?php foreach(array_keys(OJ::$result) as $key):?>
            <td><?php if(array_key_exists($key, $result[$i])) echo $result[$i][$key]; else echo '0'?></td>
        <?php endforeach;?>
    </tr>
<?php endfor;?>
    </tbody>
</table>
<table style="width: 25%;margin-top: 30px; border-left: silver solid 1px">
    <thead>
    <tr><?php foreach(OJ::$language as $lang) echo "<th>{$lang}</th>";?></tr>
    </thead>
    <tbody>
<?php for($i = 0; $i < $problem_count; $i++):?>
    <tr>
        <?php if (!array_key_exists($i, $language)) $language[$i] = array();?>
        <?php foreach(array_keys(OJ::$language) as $key):?>
            <td><?php if(array_key_exists($key, $language[$i])) echo $language[$i][$key]; else echo '0'?></td>
        <?php endforeach;?>
    </tr>
<?php endfor;?>
    </tbody>
</table>