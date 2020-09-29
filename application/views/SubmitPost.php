
<body>
<div class="container">
<div class="jumbotron">
<?php echo form_open("Posts/submitPost/$threadID");?>
  <fieldset>
    <legend class = "display-3">Submit a Post!</legend>
    <div class="form-group">
      <label for="postName">Post Name</label>
      <input type="text" class="form-control" name ="postName" id="postName"  placeholder="Enter Post Name" pattern="(?=.*[a-z]).{4,45}" value =<?php echo set_value('postName'); ?> >
    </div>
    <div class="form-group">
    <label for="PostDescription">Post description (400 char max)</label>
    <textarea class="form-control" id="PostDescription" name ="PostDescription" rows="3" placeholder="Enter the post description" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{1,400}" value = <?php echo set_value('PostDescription'); ?>> </textarea>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <?php echo validation_errors();?>
</div>
</div>
</div>
</body>