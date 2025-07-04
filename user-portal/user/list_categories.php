<?php
include_once('../database.php');
$sub=$_POST['sub'];
$data=DataBase::SelectData("SELECT `pc_id`, `pc_name`, `psc_name` FROM `product_category` 
where pc_name='$sub'");
if(mysqli_num_rows($data)>0){
?>
    <option value="0">--Select Product Sub Category--</option>  
<?php
}
while($row1=mysqli_fetch_array($data)) {
?>
<option value="<?php echo $row1['pc_id']; ?>"><?php echo strtoupper( $row1['psc_name'] ); ?></option>                                             
<?php
}
if(mysqli_num_rows($data)==0){
?>
    <option value="0">--No Product Sub Categories Found--</option>  
<?php
}
?>
