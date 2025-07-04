<?php
	include_once '../../database.php';
	$pd_id=$_POST['pd_id'];
	if($pd_id!=0){
	$biddetails=DataBase::SelectData("SELECT `rw_id`, `rw_review`, `ur_name`, `pd_id`,DATE_FORMAT(`rw_date`, '%M %d %Y') as rw_date , `rw_time` FROM `reviews`
	inner join user on  user.ur_id=reviews.ur_id
	 where  pd_id=$pd_id  order by rw_date,rw_time desc");
	}
?>
	<div class="table-responsive">
		<table class="table">
	
			<?php
			while($rows=mysqli_fetch_array($biddetails)){
			?>
			<tr>
				<td class="reviews">
					<h4>&#8220; <?php echo $rows['rw_review']; ?> &#8221;</h4>
					<p  class="commendedby">commented by:<i ><?php echo $rows['ur_name']; ?></i></p>
					<p  class="dateofcomment">commented on:<i ><?php echo $rows['rw_date']; ?> <?php echo $rows['rw_time']; ?></i></p>
				</td>
		
			</tr>
			<?php
			}
			if(mysqli_num_rows($biddetails)==0){
			?>
			<td class="reviews">
			<h4 class="noreviews">no comments</h4>
			</td>
			<?php
			}
			?>
	  </table>
	</div>			