<ul class="nav navbar-nav">
    <li class="home <?php if (Request::$current->controller() == 'Index' AND Request::$current->action() == 'index'):?>active<?php endif;?>" ><a href="<?php e::home();?>">Home</a></li>
    <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('problem/list');?>">Problem</a></li>
    <li <?php if (Request::$current->controller() == 'Solution' AND Request::$current->action() == 'status'):?>class="active" <?php endif;?>><a href="<?php e::url('status');?>">Status</a></li>
    <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'list' ):?>class="active" <?php endif;?>><a href="<?php e::url('rank/user');?>">Rank</a></li>
    <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('contest');?>">Contest</a></li>
    <li <?php if (Request::$current->action() == 'faqs'):?>class="active" <?php endif;?>><a href="<?php e::url('faqs');?>">Faqs</a></li>
    <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="<?php e::url('discuss');?>">Discuss</a></li>
</ul>

<ul class="nav navbar-nav pull-right nav-controls">
    <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
        <li><a href="<?php e::url('user/login');?>" data-no-turbolink>Login</a></li>
        <li><a href="<?php e::url('user/register');?>" data-no-turbolink>Register</a></li>
    <?php else: ?>
        <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'profile' ):?>class="active" <?php endif;?>>
            <a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>" title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
        <li class="divider-vertical"></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php e::url('user/edit');?>">Setting</a></li>
                <li><a href="<?php e::url('mail');?>">Message</a></li>
                <?php if ( OJ::is_admin() ): ?>
                    <li><a href="<?php e::url('admin');?>" data-no-turbolink>Admin Control</a></li>
                <?php endif; ?>
                <?php if ( $cu ):?>
                    <li class="divider"></li>
                    <li><a href="<?php e::url('logout');?>">Logout</a></li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif;?>
</ul>
