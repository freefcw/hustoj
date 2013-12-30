<div class="user-profile">
    <div class="span8">
        <!--<img src="#userimage" alt="user image"/>-->
        <h2><?php echo $u['user_id'];?></h2>

        <p><?php echo $u['nick'];?></p>
    </div>
    <div class="row">
        <div class="span8 user-card">
            <ul class="nav nav-pills nav-stacked">
                <li><a><i class="icon-signal"></i> 5</a></li>
                <li><a><i class="icon-home"></i> <?php echo $u['school'];?></a></li>
                <li><a><i class="icon-envelope"></i> <?php echo str_replace('@', '##', $u['email']);?></a></li>
                <li><a><i class="icon-time"></i> 出生于公元 <?php echo($u['reg_time']);?></a></li>
                <li><a><i class="icon-time"></i> 上次访问时间 <?php echo($u['accesstime']);?></a></li>
            </ul>
        </div>
        <div class="span3 user-stats">
            <ul class="nav nav-pills">
                <li class="stats active count-accept"><a><span
                        class="count"><?php echo($u['solved']);?></span>accepted</a></li>
                <li class="stats active count-submit"><a><span class="count"><?php echo $u['submit'];?></span>submission</a>
                </li>
            </ul>
        </div>
    </div>

</div>