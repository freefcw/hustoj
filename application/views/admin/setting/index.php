<table class="table table-responsive">
    <thead>
    <tr><th style="width: 200px">Name</th><th>Description</th></tr>
    </thead>
    <tbody>
    <?php foreach(Model_Option::all_options() as $option):?>
        <tr>
            <td><a href="/admin/setting/edit/<?php echo($option['option_id']);?>"><?php echo($option['name']);?></a></td>
            <td><?php echo($option['desc']);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>