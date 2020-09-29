<div class="container">
<div class="jumbotron">
<h5 class="text-danger"> Any removed Category will remove all Associated Posts and Threads!</h5>
<table class ="table table-striped table-dark table-bordered">
<thead class ="thead-secondary">
<?php
echo "<tr>";
    echo "<td> Category ID</td>";
    echo "<td> Category Name </td>";
    echo "<td> Remove Category </td>";
    echo "</tr>";
foreach($categories as $row)
{
    echo "<tr>";
    echo "<td>".$row->categoryID."</td>";
    echo "<td>".$row->CategoryName."</td>";
    echo "<td>".'<a href="'.base_url().'admins/RemoveCategory/'.$row->categoryID.'"> X </a> </td>';
    echo "</tr>";
}
?>
<?php
echo form_open('admins/CreateCategory');
?>
    <div class="form-group">
      <label for="Category">Category</label>
      <input type="text" class="form-control" name ="Category" id="Category"  placeholder="Enter Category" pattern="(?=.*[a-z]).{1,45}" value =<?php echo set_value('Category'); ?> >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <?php
    echo validation_errors();?>
</div>

</div>
</div>



</table>
