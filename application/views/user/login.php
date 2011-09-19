<?php echo Form::open('/user/login'); ?>
<?php if ($errors): ?>
<p class="message">Some errors were encountered, please check the details you entered.</p>
<ul class="errors">
<?php foreach ($errors as $message): ?>
    <li><?php echo $message ?></li>
<?php endforeach ?>
<?php endif ?>
<dl>
<dt><?php echo Form::label('username', 'Username');?></dt>
<dd><?php echo Form::input('username', $post['username']) ?></dd>
<dt><?php echo Form::label('password', 'Password');?></dt>
<dd><?php echo Form::password('password') ?></dd>
<?php echo Form::submit(NULL, 'Login'); ?>
<?php echo Form::close(); ?>
