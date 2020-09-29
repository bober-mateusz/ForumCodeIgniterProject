
<body>
<div class="container">
<div class="jumbotron">
<?php echo form_open("Comments/submitComment/$postID");?>
  <fieldset>
    <legend class = "display-3">Submit a Comment!</legend>
    <label for="PostDescription">Submit Comment! (200 char max)</label>
    <textarea class="form-control" id="comment" name ="comment" rows="3" placeholder="Enter the post description" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{1,200}" value = <?php echo set_value('comment'); ?>> </textarea>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
    </form>
    <hr>
    <?php echo validation_errors();?>
</div>
</div>
</div>
</body>