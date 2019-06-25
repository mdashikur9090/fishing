<?php
	include( "../header.php" );
	include( "../dbCon.php" );
	$con = connection();


?>

<?php
	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==0)){
?>
	<script>
		location.href="<?=$_SESSION["directory"]?>index.php";
	</script>
<?php
	}
?>	


<div class="place-detail product">
	<div class="container">
		<div class="section-header">
			<h3>User List </h3>
		</div><!-- Section Header /- -->

		<!--Table-->
		<table class="table table-striped w-auto">
		  <!--Table head-->
		  <thead>
		    <tr>
		      <th>User ID</th>
		      <th>Email</th>
		      <th>Name</th>
		      <th>Address</th>
		      <th>Phone</th>
		    </tr>
		  </thead>
		  <!--Table head-->

		  <!--Table body-->
		 <tbody>

			<?php 
								
				$sql1="SELECT * FROM `user` WHERE ID !=".$_SESSION["userid"]." order BY ID DESC";
				$result1=$con->query($sql1);

				if($result1->num_rows>0){
					foreach($result1 as $row){

			?>

				
				    <tr class="table-info">
				      <th scope="row"><?=$row["ID"]?></th>
				      <td><?=$row["email"]?></td>
				      <td><?=$row["name"]?></td>
				      <td><?=$row["address"]?></td>
				      <td><?=$row["phone"]?></td>
				    </tr>
				  

			<?php

					}
				}

			?>

			</tbody>
		  <!--Table body-->
		</table>
		<!--Table-->
	</div>
</div>





<!-- Footer Section -->
<?php

include( "../footer.php" );
?>
<!-- Footer Section /- -->

