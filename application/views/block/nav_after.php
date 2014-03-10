            </ul>

            <ul class="nav navbar-nav pull-right">
                <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
                    <li><a href="<?php e::url('user/login');?>" data-no-turbolink>Login</a></li>
                    <li><a href="<?php e::url('user/register');?>" data-no-turbolink>Register</a></li>
                <?php else: ?>
                <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'profile' ):?>class="active" <?php endif;?>><a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>"
                       title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
                <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'edit' ):?>class="active" <?php endif;?>><a href="<?php e::url('user/edit');?>">Setting</a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php e::url('mail');?>">Message</a></li>
                        <?php if ( OJ::is_admin() ): ?>
                            <li><a href="<?php e::url('admin');?>" data-no-turbolink>Admin Control</a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="<?php e::url('logout');?>">Logout</a></li>
                    <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
