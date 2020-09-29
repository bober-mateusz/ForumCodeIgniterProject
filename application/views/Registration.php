




<body>
<div class="container">
<div class="jumbotron">

<?php echo form_open('Registrations');?>
  <fieldset>
    <legend class = "display-3">Register Now!</legend>
    <div class="form-group">
      <label for="UserName">Username</label>
      <input type="text" class="form-control" name ="UserName" id="UserName"  placeholder="Enter Username" pattern="(?=.*[a-z]).{4,45}" value =<?php echo set_value('UserName'); ?> >
      <small id="emailHelp" class="form-text text-muted">The Username Has to be atleast 4 characters long</small>
    </div>
    <div class="form-group">
      <label for="Password1">Password</label>
      <input type="password" class="form-control" name = "Password1" id="Password1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,60}" value = <?php echo set_value('Password1'); ?>>
    </div>
    <div class="form-group">
      <label for="Password2">Re-Input Password</label>
      <input type="password" class="form-control" name = "Password2" id="Password2" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,60}" value = <?php echo set_value('Password2'); ?>>
    </div>
    <div class="form-group">
      <label for="Email">Email</label>
      <input type="Email" class="form-control" name = "Email" id="Email" placeholder="Email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" value = <?php echo set_value('Email'); ?>>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <?php echo validation_errors();?>
</div>
</div>
</div>





</body>