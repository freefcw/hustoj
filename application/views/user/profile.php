<div class="user-profile">
    <div class="span8">
        <!--<img src="#userimage" alt="user image"/>-->
        <h2><?php echo $u['user_id'];?></h2>

        <p><?php echo $u['nick'];?></p>
    </div>
    <div class="row">
        <div class="col-sm-8 user-card">
            <ul class="nav nav-pills nav-stacked">
                <li><a><i class="icon-signal"></i> 5</a></li>
                <li><a><i class="icon-home"></i> <?php echo $u['school'];?></a></li>
                <li><a><i class="icon-envelope"></i> <?php echo str_replace('@', '##', $u['email']);?></a></li>
                <li><a><i class="icon-time"></i> 出生于公元 <?php echo($u['reg_time']);?></a></li>
                <li><a><i class="icon-time"></i> 上次访问时间 <?php echo($u['accesstime']);?></a></li>
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