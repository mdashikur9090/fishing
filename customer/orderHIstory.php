<?php
 	include( "../header.php" );
 	include( "../dbCon.php" );
 	$con = connection();
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
?>
	<script>
		location.href="<?=$_SESSION["directory"]?>index.php";
	</script>

<?php } ?>


<!-- Page Header -->
<div class="container-fluid no-padding page-header" style="margin-top: 200px;">
	<div class="container">
		<ol class="breadcrumb">
			<li>Buy and Hire order history of fishing kids and tool</li>
		</ol>
	</div>
</div> <!-- Page Header /- -->
<div class="padding-80"></div>

<!-- Cart -->
<div class="woocommerce-cart container-fluid no-left-padding no-right-padding">
	<!-- Container -->
	<div class="container">
		
		<div class="table-responsive">
		  <table class="table">

		  	<!--Table head-->
			<thead>
			    <tr>
				    <th>Order ID</th>
				    <th>Date</th>
				    <th>Details</th>
			    </tr>
			</thead>
			 <!--Table head-->
			 <!--Table body-->
			<tbody>

				<?php 
									
					$sql1="SELECT * FROM `order` WHERE `userID`=".$_SESSION["userid"]." AND order_type=1 OR order_type=2";
					$result1=$con->query($sql1);

					if($result1->num_rows>0){
						foreach($result1 as $row){

				?>
				   <tr>
					   <td><?=$row["ID"]?></td> 
					   <td><?=$row["date_time"]?></td>
					   <td><a href="order-details.php?orderId=<?=$row["ID"]?>">View Order Items</a></td>
				   </tr>

				<?php

						}
					}

				?>


			</tbody>
		  <!--Table body-->
		  </table>
		</div>

	</div>
	<!-- Container /- -->
</div> <!-- Cart /- -->



<!-- Page Header -->
<div class="container-fluid no-padding page-header">
	<div class="container">
		<ol class="breadcrumb">
			<li>Booking place Order History</li>
		</ol>
	</div>
</div> <!-- Page Header /- -->
<div class="padding-80"></div>

<!-- Cart -->
<div class="woocommerce-cart container-fluid no-left-padding no-right-padding">
	<!-- Container -->
	<div class="container">
		
		<div class="table-responsive">
		  <table class="table">

		  	<!--Table head-->
			<thead>
			    <tr>
				    <th>Order ID</th>
				    <th>Date</th>
				    <th>Details</th>
			    </tr>
			</thead>
			 <!--Table head-->
			 <!--Table body-->
			<tbody>

				<?php 
									
					$sql1="SELECT * FROM `order` WHERE `userID`=".$_SESSION["userid"]." AND order_type=3";
					$result1=$con->query($sql1);

					if($result1->num_rows>0){
						foreach($result1 as $row){

				?>
				   <tr>
					   <td><?=$row["ID"]?></td> 
					   <td><?=$row["date_time"]?></td>
					   <td><a href="ticket_order-details.php?orderId=<?=$row["ID"]?>">View Order Items</a></td>
				   </tr>

				<?php

						}
					}

				?>


			</tbody>
		  <!--Table body-->
		  </table>
		</div>

	</div>
	<!-- Container /- -->
</div> <!-- Cart /- -->








 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->