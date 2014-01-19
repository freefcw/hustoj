<h1>Search Result of '<?php echo($search_text);?>' in <?php echo $area?> </h1>

<?php echo(View::factory('problem/searchform'));?>

<table class="table table-striped">
<thead>
    <tr><th>ID</th><th>TITLE</th><th>Ratio(AC/Submit)</th></tr>
</thead>
<tbody>
<?php foreach($problemlist as $problem): ?>
    <tr>
        <td class="pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo(HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title));?>
        <?php if ($problem->source != ''): ?>
            <span> - <?php echo($problem->source);?></span>
        <?php endif;?>
        </td>
        <td><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
