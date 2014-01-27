<div class="user-profile">
    <div class="span8">
        <!--<img src="#userimage" alt="user image"/>-->
        <h2><?php /* @var Model_User $user */echo $user['user_id'];?> - <?php echo $user['nick'];?></h2>
    </div>
    <div class="row">
        <div class="col-sm-8 user-card">
            <ul class="nav nav-pills nav-stacked">
                <li><a><i class="glyphicon glyphicon-home"></i> <?php echo $user['school'];?></a></li>
                <li><a><i class="glyphicon glyphicon-envelope"></i> <?php echo str_replace('@', '##', $user['email']);?></a></li>
                <li><a><i class="glyphicon glyphicon-time"></i> 出生于公元 <?php echo($user['reg_time']);?></a></li>
                <li><a><i class="glyphicon glyphicon-time"></i> 上次访问时间 <?php echo($user['accesstime']);?></a></li>
            </ul>
        </div>
        <div class="col-sm-4 user-stats">
            <ul class="nav nav-pills">
                <li class="active count count-accept">
                    <a><?php echo($user['solved']);?></a></li>
                <li class="active count count-submit">
                    <a><?php echo $user['submit'];?></a>
                </li>
            </ul>
        </div>
    </div>
<div class="well solved_problems">
    <?php foreach($user->problems_resolved() as $pid):?>
        <a class="btn btn-success" href="/problem/show/<?php echo($pid);?>" style="font-size: <?php echo(rand(10, 25));?>px"><?php echo($pid);?></a>
    <?php endforeach;?>
</div>
</div>