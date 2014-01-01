<div class="row index">
    <div class="news">
        <h4>Recent News</h4>
        <ol>
        <?php foreach($rss as $item):?>
<li><a href="<?php echo($item['link']);?>"><?php echo($item['title']);?></a></li>
        <?php endforeach;?>
        </ol>
    </div>
    <div class="welcome">
<h3>Welcome to HUSTOJ</h3>
<p>for the new user, please see the tutorials</p>
<p>If you interested in Online Judge, please go the bitbucket</p>
<p>Any problem, please see the contact information in contact page</p>
    </div>
</div>
