
<div class="container">
<div class="jumbotron">

<table class ="table table-striped table-dark table-bordered">
<thead class ="thead-secondary">
<?php
echo form_open("admins/CreateThread");
?>

    <div class="form-group">
      <label for="threadName">Thread Name</label>
      <input type="text" class="form-control" name ="threadName" id="threadName"  placeholder="Enter Thread name" pattern="(?=.*[a-z]).{1,45}" value =<?php echo set_value('threadName'); ?> >
    </div>
    <div class="form-group">
      <label for="threadDescription">Thread Description</label>
      <input type="text" class="form-control" name = "threadDescription" id="threadDescription" placeholder="Enter Thread Description" pattern="(?=.*[a-z]).{1,60}" value = <?php echo set_value('Password'); ?>>
    </div>
    <div class="form-group">
      <label for="Category">Choose a category : </label>
      <select name = "Category" id = "Category">
    <?php
    foreach($categories as $cat)
    {
        echo '<option value="'.$cat->categoryID.'">'.$cat->CategoryName.'</option>';
    }
    ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>








<?php
echo "<tr>";
echo "<td> Thread Name </td>";
echo "<td> Thread Description </td>";
echo "<td> Thread ID </td>";
echo "<td> Remove Thread </td>";
echo "</tr>";


foreach($threads as $thread)
{
    
    foreach($thread as $element)
    {
    $threadID = $element['threadID'];
    echo "<tr>";
    echo "<td>".$element['threadName']."</td>";
    echo "<td>".$element['threadDescription']."</td>";
    echo "<td>".$threadID."</td>";
    echo "<td>".'<a href="'.base_url().'admins/RemoveThread/'.$threadID.'"> X </a> </td>';
    echo "</tr>";
    }
}
   



?>



</table>






</div>
</div>