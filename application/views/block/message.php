<?php $messages = Session::instance()->get_once('info');if ( $messages ):?>
    <?php foreach($messages as $msg):?>
        <div class="alert alert-success">
            <?php echo($msg);?>
        </div>
    <?php endforeach;?>
<?php endif;?>
<?php $errors = Session::instance()->get_once('error');if ( $errors ):?>
    <?php foreach($errors as $msg):?>
        <div class="alert alert-danger">
            <?php echo($msg);?>
        </div>
    <?php endforeach;?>
<?php endif;?>
