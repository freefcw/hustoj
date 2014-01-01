<h2 class="page-title">Register Information</h2>
<?php if (isset($errors)):?>
    <ul class="error">
        <?php foreach($errors as $err):?>
            <li><?php echo $err;?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form role="form" class="form-horizontal" action="/user/new" method="POST" class="form-horizontal" style="width: 40%;margin-left:25%">
    <div class="form-group">
        <label for="username" class="col-sm-5 control-label">User ID(3-15)*</label>
        <div class="col-sm-7">
            <input class="form-control" name="username" type="text" /></div>
        </div>
    <div class="form-group">
        <label class="col-sm-5 control-label">Nick Name(0-10)</label>
        <div class="col-sm-7">
            <input class="form-control" name="nick" type="text" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label">Password(min 6)*</label>
        <div class="col-sm-7">
            <input class="form-control" name="password" type="password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label">Repeat Password*</label>
        <div class="col-sm-7">
            <input class="form-control" name="confirm" type="password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label">School(30)</label>
        <div class="col-sm-7">
            <input class="form-control" name="school" type="text" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 control-label">Email(30)*</label>
        <div class="col-sm-7">
            <input class="form-control" name="email" type="text" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-6">
            <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
            <input type="reset" name="reset" class="btn"/>
        </div>
    </div>
</form>
<br style="clear: both;"/>