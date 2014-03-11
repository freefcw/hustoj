<div class="alert-info">
    <p>These config option is at base.php, you can click the name to add database, the config in the database have high prior than php file.</p>
</div>
<table class="table table-responsive">
    <thead>
    <tr><th style="width: 200px">Name</th><th>Value</th></tr>
    </thead>
    <tbody>
    <?php foreach(Model_Option::defaults() as $key => $value):?>
        <tr class="config-default">
            <td><a href="<?php e::url("/admin/setting/edit/{$key}");?>" title="Click to add database"><?php echo($key);?></a></td>
            <td><?php echo($value);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>