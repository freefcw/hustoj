<ul class="nav navbar-nav">
    <li class="home <?php if (Request::$current->controller() == 'Index'):?>active<?php endif;?>" ><a href="<?php e::url('admin');?>"><?php echo(__('top_backend.dashboard')); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/problem');?>"><?php echo(__('top_backend.problem')); ?></a></li>
    <li <?php if (Request::$current->controller() == 'User'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/user');?>"><?php echo(__('top_backend.user')); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/contest');?>"><?php echo(__('top_backend.contest')); ?></a></li>
    <li <?php if (Request::$current->controller() == 'News'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/news');?>"><?php echo(__('top_backend.news')); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Setting'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/setting');?>"><?php echo(__('top_backend.configure')); ?></a></li>
</ul>

<ul class="nav navbar-nav pull-right nav-controls">
    <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
        <li><a href="<?php e::url('user/login');?>" data-no-turbolink><?php echo(__("top_frontend.login")); ?></a></li>
        <li><a href="<?php e::url('user/register');?>" data-no-turbolink><?php echo(__("top_frontend.register")); ?></a></li>
    <?php else: ?>
        <li><a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>" title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
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
