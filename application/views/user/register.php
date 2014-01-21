<h2 class="page-title">Register Information</h2>
<?php if (isset($errors)):?>
    <ul class="error">
        <?php foreach($errors as $err):?>
            <li><?php echo $err;?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form role="form" class="form-horizontal col-sm-6 col-sm-offset-2" action="/user/new" method="POST">
    <div class="form-group">
        <label for="username" class="col-sm-5 control-label">User ID(3-15)*</label>
        <div class="col-sm-7">
            <input class="form-control" id="username" name="username" type="text" /></div>
        </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="nick">Nick Name(0-10)</label>
        <div class="col-sm-7">
            <input class="form-control" name="nick" id="nick" type="text" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="password">Password(min 6)*</label>
        <div class="col-sm-7">
            <input class="form-control" id="password" name="password" type="password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="confirm">Repeat Password*</label>
        <div class="col-sm-7">
            <input class="form-control" id="confirm" name="confirm" type="password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="school">School(30)</label>
        <div class="col-sm-7">
            <input class="form-control" name="school" id="school" type="text" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label" for="email">Email(30)*</label>
        <div class="col-sm-7">
            <input class="form-control" name="email" id="email" type="text" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-5">
            <input type="submit" class="btn btn-primary" value="Register"/>
        </div>
    </div>
</form>