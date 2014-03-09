<ul class="nav nav-pills nav-stacked">
    <li <?php if (Request::$current->action() == 'inbox'):?> class="active"<?php endif;?>><a href="<?php e::url('/mail/inbox');?>">Inbox</a></li>
    <li <?php if (Request::$current->action() == 'outbox'):?> class="active"<?php endif;?>><a href="<?php e::url('/mail/outbox');?>">Outbox</a></li>
    <li <?php if (Request::$current->action() == 'new'):?> class="active"<?php endif;?>><a href="<?php e::url('/mail/new');?>">New Mail</a></li>
</ul>