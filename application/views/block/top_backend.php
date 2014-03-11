<ul class="nav navbar-nav">
    <li class="home <?php if (Request::$current->controller() == 'Index'):?>active<?php endif;?>" ><a href="<?php e::url('admin');?>">Home</a></li>
    <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/problem');?>">Problem</a></li>
    <li <?php if (Request::$current->controller() == 'User'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/user');?>">User</a></li>
    <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/contest');?>">Contest</a></li>
    <li <?php if (Request::$current->controller() == 'News'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/news');?>">News</a></li>
    <li <?php if (Request::$current->controller() == 'Setting'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/setting');?>">Configure</a></li>
    <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="#">Discuss</a></li>
</ul>
<ul class="nav navbar-nav pull-right nav-controls">
    <li><a href="<?php echo(Route::url('profile', array('uid' => $current_user->user_id)));?>"
           title="<?php echo($current_user->user_id);?>"><?php echo($current_user->user_id);?></a></li>
    <li class="divider-vertical"></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php e::url('mail');?>">Message</a></li>
            <li class="divider"></li>
            <li><a href="<?php e::url('logout');?>">Logout</a></li>
        </ul>
    </li>
</ul>