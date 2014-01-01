<ul class="breadcrumb">
    <li><a href="/discuss/">Discuss</a> <span class="divider">/</span></li>
</ul>
<form class="form-inline well" role="form" action="/discuss" method="GET">
    <div class="form-group">
        <label class="sr-only" for="pid">Problem Id</label>
        <input placeholder="Problem Id" name="pid" id="pid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="uid">User Id</label>
        <input placeholder="User Id" name="uid" id="uid" class="form-control"/>
    </div>
    <input type="submit" value="Filter" class="btn">
    <a href="/discuss/new" class="btn btn-info pull-right">New Topic</a>
</form>
<hr style="clear: both"/>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
    </tr>
    </thead>
    <tbody>
    <?php /* @var Model_Topic[] $topic_list */ foreach ($topic_list as $t): ?>
    <tr>
        <td>
            <a href="/problem/show/<?php echo($t->pid);?>" style="color: #000000"> <?php echo($t->pid);?> </a>
            <a href="/t/<?php echo($t->tid);?>"><strong><?php echo($t->title);?></strong></a>
        </td>
        <td><a href="<?php echo(Route::url('profile', array('uid' => $t->author_id)));?>"><?php echo($t->author_id);?></a></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>