<a id="menu-toggle" href="#" ><i class="glyphicon glyphicon-align-justify"></i> MENU</a>
<a id="menu-close" style="display:none;" href="#" ><i class="glyphicon glyphicon-remove"></i> CLOSE</a>
<nav id="right-sidebar-wrapper">
	<ul class="right-sidebar-nav">
		<li>
			<a href="#"><i class="glyphicon glyphicon-chevron-right"></i>---</a>
		</li>
		<?php
		while($rows=mysqli_fetch_array($category)){
		?>
			<li>
				<a href="products.php?pc_id=<?php echo $rows['pc_id'];?>"><i class="glyphicon glyphicon-chevron-right"></i>
				<?php
					echo $rows['pc_name'];
				?>
				</a>
			</li>
		<?php
		}
		?>
	</ul>
</nav>

