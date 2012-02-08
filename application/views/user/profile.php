<div class="user-profile">
<div class="row">
    <div class="span1">
        <!--<img src="#userimage" alt="user image"/>-->
    </div>
    <div class="span8">
        <h2><?php echo $u['user_id'];?></h2>
        <p ><?php echo $u['nick'];?></p>
        <p style="color: rgba(0, 0, 0, 0.15);"><?php echo $u['user_id'];?> 出生于公元<?php echo OJ::mtime($u['reg_time']);?>, 最后一次访问本站的时间是 <?php echo OJ::mtime($u['access_time']);?></p>
       <ul class="nav nav-list">
           <li><i class="icon-home"></i><?php echo $u['school'];?></li>
           <li><i class="icon-inbox"></i><?php echo $u['submit'];?> submission</li>
           <li><i class="icon-ok-sign"></i><?php echo $u['solved'];?> accepted</li>
       </ul>
    </div>
</div>
<div class="row">
    <div class="span10">
    <h3>Recent Topic</h3>
    <ul class="nav">
        <li></li>
    </ul>
    </div>
</div>
<div class="row">
    <div class="span10">
    <h3>Recent Passed Problem</h3>
    <ul class="nav">
        <li></li>
    </ul>
    </div>
</div>
</div>