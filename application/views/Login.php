<div class="container">
<div class="jumbotron">

<?php echo form_open('Logins');?>
  <fieldset>
    <legend class = "display-3">Login now!</legend>
    <div class="form-group">
      <label for="UserName">Username</label>
      <input type="text" class="form-control" name ="UserName" id="UserName"  placeholder="Enter Username" pattern="(?=.*[a-z]).{1,45}" value =<?php echo set_value('UserName'); ?> >
    </div>
    <div class="form-group">
      <label for="Password1">Password</label>
      <input type="password" class="form-control" name = "Password" id="Password" placeholder="Password" pattern="(?=.*[a-z]).{1,60}" value = <?php echo set_value('Password'); ?>>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <?php
    echo $error; 
    echo validation_errors();?>
</div>
</div>
</div>