<h3 class="page-title"></h3>
<?php echo View::factory('contest/nav');?>

<table style="width: 70%;margin-top: 30px;float: left;">
    <thead>
    <tr><th></th><?php foreach(OJ::$result as $rt) echo "<th>{$rt}</th>";?></tr>
    </thead>
    <tbody>
<?php for($i = 1; $i <= $problem_count; $i++):?>
    <tr><td><?php echo OJ::contest_pid($i);?></td>
        <?php if (!array_key_exists($i-1, $result)) $result[$i-1] = array();?>
        <?php foreach(array_keys(OJ::$result) as $key):?>
            <td><?php if(array_key_exists($key, $result[$i-1])) echo $result[$i-1][$key]; else echo '0'?></td>
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
<?php for($i = 1; $i <= $problem_count; $i++):?>
    <tr>
        <?php if (!array_key_exists($i-1, $language)) $language[$i-1] = array();?>
        <?php foreach(array_keys(OJ::$language) as $key):?>
            <td><?php if(array_key_exists($key, $language[$i-1])) echo $language[$i-1][$key]; else echo '0'?></td>
        <?php endforeach;?>
    </tr>
<?php endfor;?>
    </tbody>
</table>