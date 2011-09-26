<?php echo Form::open('/problem/submit', array('class'=>'submit'));?>
<div class="att">
<?php echo Form::label('pid', "Problem ID : ");?>
<?php echo Form::input('pid', $pid); ?>
</div>
<?php echo Form::textarea('source');?>
</br>
<?php echo Form::submit(NULL, 'Submit');?>
<?php echo Form::close();?>