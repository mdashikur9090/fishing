<?php
	include( "../header.php" );
	include( "../dbCon.php" );
	include("../email.php");
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
			<h3>Fishing kits and tool buy order list </h3>
		</div><!-- Section Header /- -->

			<!--Table-->
			<table class="table table-striped w-auto">

			  <!--Table head-->
			  <thead>
			    <tr>
			      <th>Order ID</th>
			      <th>Date</th>
			      <th>User ID</th>
			      <th>UserName</th>
			      <th>Order Status</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <!--Table head-->

			  <!--Table body-->
			 <tbody>

				<?php 
									
					$sql1="SELECT order.ID, order.userID, date_time, orderStatus, user.name FROM `order`INNER JOIN user ON (order.userID=user.ID) where order.order_type=1 ORDER BY order.ID DESC";
					$result1=$con->query($sql1);

					if($result1->num_rows>0){
						foreach($result1 as $row){

				?>

					 
					    <tr class="table-info">
					      <th scope="row"><?=$row["ID"]?></th>
					      <td><?=$row["date_time"]?></td>
					      <td><?=$row["userID"]?></td>
					      <td><?=$row["name"]?></td>
					      <td> <?php if($row["orderStatus"]==1) { echo'Confirmed'; }else { echo 'Pending'; }?></td>
					      <td><a href="order-details.php?orderId=<?=$row["ID"]?>">Details</a></td>
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

<div class="place-detail product">
	<div class="container">
		<div class="section-header">
			<h3>Fishing kits and tool hire order list </h3>
		</div><!-- Section Header /- -->

			<!--Table-->
			<table class="table table-striped w-auto">

			  <!--Table head-->
			  <thead>
			    <tr>
			      <th>Order ID</th>
			      <th>Date</th>
			      <th>User ID</th>
			      <th>UserName</th>
			      <th>Order Status</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <!--Table head-->

			  <!--Table body-->
			 <tbody>

				<?php 
									
					$sql1="SELECT order.ID, order.userID, date_time, orderStatus, user.name FROM `order`INNER JOIN user ON (order.userID=user.ID) where order.order_type=2 ORDER BY order.ID DESC";
					$result1=$con->query($sql1);

					if($result1->num_rows>0){
						foreach($result1 as $row){

				?>

					 
					    <tr class="table-info">
					      <th scope="row"><?=$row["ID"]?></th>
					      <td><?=$row["date_time"]?></td>
					      <td><?=$row["userID"]?></td>
					      <td><?=$row["name"]?></td>
					      <td> <?php if($row["orderStatus"]==1) { echo'Confirmed'; }else { echo 'Pending'; }?></td>
					      <td><a href="order-details.php?orderId=<?=$row["ID"]?>">Details</a></td>
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

