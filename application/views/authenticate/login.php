<form class="form-horizontal" method="post" action="<?php echo site_url('authenticate/login') ?>">
  <fieldset>
    <legend>User Login</legend>
<?php if ( validation_errors() != ""): ?>
<div class="alert alert-error">
  Incorrect username and password comnbination
</div>   
<?php endif ?>

   
    <div class="control-group">
      <label class="control-label" for="input01">Username</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="input01" name="username">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="input01">Password</label>
      <div class="controls">
        <input type="password" class="input-xlarge" id="input01" name="password"> <br>
            <a href="<?php echo site_url('authenticate/register') ?>">Register</a>
      </div>
    </div>

    <div class="control-group">

      <div class="controls">
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
      </div>
    </div>    
    
  </fieldset>
</form>