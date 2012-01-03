<h3 class="page-title">Submit Code</h3>
<?php echo Form::open('/problem/submit', array('class'=>'submit'));?>
<fieldset>
<?php echo Form::label('pid', "Problem ID : ");?>
<?php echo Form::input('pid', $pid); ?>
<?php if (Auth::instance()->get_user() == null):?>
    <?php echo Form::label('username', "Username : ");?>
    <?php echo Form::input('username', Cookie::get('username', '')); ?>
    <?php echo Form::label('password', "Password : ");?>
    <?php echo Form::input('password'); ?>
<?php endif;?>
</fieldset>
<?php echo Form::textarea('source');?>
<?php echo Form::submit(NULL, 'Submit', array('class'=>'btn'));?>
<?php echo Form::close();?>