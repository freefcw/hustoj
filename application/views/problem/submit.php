<h3 class="page-title">Submit Code</h3>
<?php echo Form::open('/problem/submit', array('class'=>'submit'));?>
<fieldset>
<?php if (isset($cid)):?>
<?php echo Form::input('cid', $cid, array('type'=>'hidden')); ?>
<?php echo Form::input('cpid', $cpid, array('type'=>'hidden'));?>
    <div style="margin: 20px auto 10px; font-size: 14px">
<?php echo 'Prblem ', OJ::contest_pid($cpid), ' Of Contest ', $cid; ?>
    </div>
<?php else: ?>
<?php echo Form::label('pid', "Problem ID : ");?>
<?php endif;?>
<?php echo Form::label('pid', "Language : ");?>
<?php echo Form::select('language', array('0'=>'C', '1'=>'C++', '2'=>'Pascal', '3'=>'Java'));?>
<?php if (Auth::instance()->get_user() == null):?>
    <?php echo Form::label('user_id', "Username : ");?>
    <?php echo Form::input('user_id', Cookie::get('use_id', '')); ?>
    <?php echo Form::label('password', "Password : ");?>
    <?php echo Form::input('password'); ?>
<?php endif;?>
</fieldset>
<?php echo Form::textarea('source');?>
<?php echo Form::submit(NULL, 'Submit', array('class'=>'btn'));?>
<?php echo Form::close();?>