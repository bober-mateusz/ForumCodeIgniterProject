
<div class="container">
<div class="jumbotron">
<?php echo form_open('Admins/UnBanUser');?>
  <fieldset>
    <legend class = "display-3">Unban Users</legend>
    <div class="form-group">
      <label for="UserName">Username Of user</label>
      <input type="text" class="form-control" name ="UserName" id="UserName"  placeholder="Enter Username" pattern="(?=.*[a-z]).{1,45}" value =<?php echo set_value('UserName'); ?> >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>

    <?php
    if (isset($error))
    {
      echo $error;
    }
    echo validation_errors();?>
</div>
</div>
</div>