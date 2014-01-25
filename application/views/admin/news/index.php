<table class="table table-striped">
<thead>
    <tr><th>ID</th><th>Title</th><th>Time</th><th>OP</th></tr>
</thead>
<tbody>
    <?php /* @var Model_News[] $news_list */ foreach($news_list as $news):?>
    <tr>
        <td><?php echo($news->news_id);?></td>
        <td><?php echo($news->title);?></td>
        <td><?php echo($news->time);?></td>
        <td><a href="/admin/news/edit/<?php echo($news->news_id);?>">[Edit]</a></td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>