<ul class="nav navbar-nav">
    <li class="home <?php if (Request::$current->controller() == 'Index' AND Request::$current->action() == 'index'):?>active<?php endif;?>" ><a href="<?php e::home();?>"><?php echo(__("top_frontend.home")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('problem/list');?>"><?php echo(__("top_frontend.problem")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Solution' AND Request::$current->action() == 'status'):?>class="active" <?php endif;?>><a href="<?php e::url('status');?>"><?php echo(__("top_frontend.status")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'list' ):?>class="active" <?php endif;?>><a href="<?php e::url('rank/user');?>"><?php echo(__("top_frontend.rank")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('contest');?>"><?php echo(__("top_frontend.contest")); ?></a></li>
    <li <?php if (Request::$current->action() == 'faqs'):?>class="active" <?php endif;?>><a href="<?php e::url('faqs');?>"><?php echo(__("top_frontend.faqs")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="<?php e::url('discuss');?>"><?php echo(__("top_frontend.discuss")); ?></a></li>
</ul>

<ul class="nav navbar-nav pull-right nav-controls">
    <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
        <li><a href="<?php e::url('user/login');?>" data-no-turbolink><?php echo(__("top_frontend.login")); ?></a></li>
        <li><a href="<?php e::url('user/register');?>" data-no-turbolink><?php echo(__("top_frontend.register")); ?></a></li>
    <?php else: ?>
        <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'profile' ):?>class="active" <?php endif;?>>
            <a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>" title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
        <li class="divider-vertical"></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo(__("top_frontend.more")); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php e::url('user/edit');?>"><?php echo(__("top_frontend.useredit")); ?></a></li>
                <li><a href="<?php e::url('mail');?>"><?php echo(__("top_frontend.mail")); ?></a></li>
                <?php if ( OJ::is_admin() ): ?>
                    <li><a href="<?php e::url('admin');?>" data-no-turbolink><?php echo(__("top_frontend.adminctl")); ?></a></li>
                <?php endif; ?>
                <?php if ( $cu ):?>
                    <li class="divider"></li>
                    <li><a href="<?php e::url('logout');?>" data-no-turbolink><?php echo(__("top_frontend.logout")); ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif;?>
</ul>
