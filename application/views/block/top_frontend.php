<ul class="nav navbar-nav">
    <li class="home <?php if (Request::$current->controller() == 'Index' AND Request::$current->action() == 'index'):?>active<?php endif;?>" ><a href="<?php e::home();?>"><?php echo(__("top_frontend.home")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('problem/list');?>"><?php echo(__("top_frontend.problem")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Solution' AND Request::$current->action() == 'status'):?>class="active" <?php endif;?>><a href="<?php e::url('status');?>"><?php echo(__("top_frontend.status")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'list' ):?>class="active" <?php endif;?>><a href="<?php e::url('rank/user');?>"><?php echo(__("top_frontend.rank")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('contest');?>"><?php echo(__("top_frontend.contest")); ?></a></li>
    <li <?php if (Request::$current->action() == 'faqs'):?>class="active" <?php endif;?>><a href="<?php e::url('faqs');?>"><?php echo(__("top_frontend.faqs")); ?></a></li>
    <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="<?php e::url('discuss');?>"><?php echo(__("top_frontend.discuss")); ?></a></li>
</ul>
