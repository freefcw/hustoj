<?php if (Session::instance()->get('flashed_message')):?>
    <?php echo View::factory('block/message', array('message' => Session::instance()->get_once('flashed_message') ));?>
<?php endif;?>
