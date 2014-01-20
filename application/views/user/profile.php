<div class="user-profile">
    <div class="span8">
        <!--<img src="#userimage" alt="user image"/>-->
        <h2><?php /* @var Model_User $u */echo $u['user_id'];?> - <?php echo $u['nick'];?></h2>
    </div>
    <div class="row">
        <div class="col-sm-8 user-card">
            <ul class="nav nav-pills nav-stacked">
                <li><a><i class="glyphicon glyphicon-signal"></i> <?php echo sprintf('%.2f', $u->solved / $u->submit * 100);?>%( <?php echo $u->solved;?> / <?php echo $u->submit;?> )</a></li>
                <li><a><i class="glyphicon glyphicon-home"></i> <?php echo $u['school'];?></a></li>
                <li><a><i class="glyphicon glyphicon-envelope"></i> <?php echo str_replace('@', '##', $u['email']);?></a></li>
                <li><a><i class="glyphicon glyphicon-time"></i> 出生于公元 <?php echo($u['reg_time']);?></a></li>
                <li><a><i class="glyphicon glyphicon-time"></i> 上次访问时间 <?php echo($u['accesstime']);?></a></li>
            </ul>
        </div>
        <div class="col-sm-4 user-stats">
            <ul class="nav nav-pills">
                <li class="active count count-accept">
                    <a><?php echo($u['solved']);?></a></li>
                <li class="active count count-submit">
                    <a><?php echo $u['submit'];?></a>
                </li>
            </ul>
        </div>
    </div>

</div>