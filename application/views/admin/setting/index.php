<table class="table table-responsive">
    <thead>
    <tr>
        <th style="width: 200px"><?php echo(__('admin.settings.index.name')); ?></th>
        <th><?php echo(__('admin.settings.index.description')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach(Model_Option::all_options() as $option):?>
        <tr>
            <td><a href="<?php e::url("/admin/setting/edit/{$option['option_id']}");?>"><?php echo($option['name']);?></a></td>
            <td><?php echo($option['desc']);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
