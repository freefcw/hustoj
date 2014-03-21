<table class="table table-striped">
<thead>
<tr>
    <th><?php echo(__('admin.news.index.id')); ?></th>
    <th><?php echo(__('admin.news.index.title')); ?></th>
    <th><?php echo(__('admin.news.index.created')); ?></th>
    <th><?php echo(__('admin.news.index.op')); ?></th>
</tr>
</thead>
<tbody>
    <?php /* @var Model_News[] $news_list */ foreach($news_list as $news):?>
    <tr>
        <td><?php echo($news->news_id);?></td>
        <td><?php echo($news->title);?></td>
        <td><?php echo($news->time);?></td>
        <td><a href="<?php e::url("/admin/news/edit/{$news->news_id}");?>"><?php echo(__('admin.news.index.edit')); ?></a></td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>
