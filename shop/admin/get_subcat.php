<?php
include('include/config.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($con,"SELECT * FROM subcategoria WHERE categoria_id=$id");
?>
<option value="">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['subcategoria']); ?></option>
  <?php
 }
}
?>