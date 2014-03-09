<div class="user-profile">
    <div class="span8">
        <!--<img src="#userimage" alt="user image"/>-->
        <h2><?php /* @var Model_User $user */
            echo $user['user_id'], ' - ', $user['nick']; ?></h2>
    </div>
    <div class="row basic-info">
        <div class="col-sm-7 user-card">
            <ul class="nav nav-pills nav-stacked">
                <li><a><i class="glyphicon glyphicon-home"></i> <?php echo $user['school']; ?></a></li>
                <?php if ($current_user):?>
                <li><a><i class="glyphicon glyphicon-envelope"></i> <?php echo e::anti_mail_crawler($user['email']) ?></a></li>
                <?php endif;?>
                <li><a><i class="glyphicon glyphicon-time"></i> 出生于公元 <?php echo($user['reg_time']); ?></a></li>
                <li><a><i class="glyphicon glyphicon-time"></i> 上次访问时间 <?php echo($user['accesstime']); ?></a></li>
            </ul>
        </div>
        <div class="col-sm-5 user-stats">
            <ul class="nav nav-pills">
                <li class="accept" value="<?php echo($user['solved']); ?>"><?php echo($user['solved']); ?></li>
                <li class="failed"
                    value="<?php echo $user['submit'] - $user['solved']; ?>"><?php echo $user['submit'] - $user['solved']; ?></li>
                <li class="submit" value="<?php echo $user['submit']; ?>"><?php echo $user['submit']; ?></li>
            </ul>
            <script type="text/javascript">
                $('div.user-stats li').mouseenter(function (e) {
                    var ele = $(this);
                    ele.text(ele.attr('class'));
                }).mouseleave(function (e) {
                    var ele = $(this);
                    ele.text(ele.attr('value'));
                })
            </script>
        </div>
    </div>
    <div class="problem-info">
        <div class="panel panel-success solved_problems">
            <div class="panel-heading">Problem Solved</div>
            <div class="panel-body">
                <?php foreach ( $user->problems_resolved() as $pid ): ?>
                    <a class="btn btn-success" href="<?php e::url("/problem/show/{$pid}");?>"
                       style="font-size: <?php echo(rand(10, 25)); ?>px"><?php echo($pid); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="panel panel-warning tried_problems">
            <div class="panel-heading">Problem Tried</div>
            <div class="panel-body">
                <?php foreach ( $user->problems_tried() as $pid ): ?>
                    <a class="btn btn-warning" href="<?php e::url("/problem/show/{$pid}");?>"
                       style="font-size: <?php echo(rand(10, 25)); ?>px"><?php echo($pid); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>