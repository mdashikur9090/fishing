 <?php
 include( "../header.php" );
 include( "../dbCon.php" );
 include("../email.php");
 $con = connection();

 ?>

<?php
if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
<?php
}

	if (isset($_GET["confirmID"])) {
		$sql = "UPDATE `order` SET `orderStatus`=1 WHERE ID=".$_GET["confirmID"];
		$con->query( $sql );


		$sql1 = "SELECT user.email FROM `order` INNER JOIN user ON (order.userID=user.ID) WHERE order.ID=".$_GET["orderId"];
		$result = $con->query( $sql1 );

		if ( $result->num_rows > 0 ) {

			foreach($buyproducResult as $row){
					$userEmail = $row["email"];
				}
		}


		//send mail
		$to=$userEmail;
		$subject="Order Confirmation";
		$detail = "Your product Order has been placed successfuly..";
		sendmail($to, $subject, $detail);
?>
		<script>
			location.href="<?=$_SESSION["directory"]?>admin/orders.php";
		</script>
<?php
	}
	if (isset($_GET["cancelID"])) {
		$sql = "DELETE FROM `order` WHERE ID=".$_GET["cancelID"];

		//$con->query( $sql );

		$sql1 = "SELECT user.email FROM `order` INNER JOIN user ON (order.userID=user.ID) WHERE order.ID=".$_GET["orderId"];
		$result = $con->query( $sql1 );

		if ( $result->num_rows > 0 ) {

			foreach($buyproducResult as $row){
					$userEmail = $row["email"];
				}
		}


		//send mail
		$to=$userEmail;
		$subject="Order Confirmation";
		$detail = "Your product for Has been canceled..";
		//sendmail($to, $subject, $detail);


		?>
			<script>
				location.href="<?=$_SESSION["directory"]?>admin/orders.php";
			</script>
		<?php
	}


?>

	<div class="place-detail product">
		<div class="container">
			<!-- Section Header -->
			<div class="section-header">
				<h3>Ticket Boooking Order Details </h3>
			</div><!-- Section Header /- -->
			
			<!-- Row -->
			<div class="row">

				<?php
					$sql1 = "SELECT orderStatus, user.email FROM `order` INNER JOIN user ON (order.userID=user.ID) WHERE order.ID=".$_GET["orderId"];
					$result = $con->query( $sql1 );

					if ( $result->num_rows > 0 ) {

						foreach($result as $row){
								$orderStatus = $row["orderStatus"];
							}

						if ($orderStatus==0) {
							?>
							<!-- <a href="?confirmID=<?=$_GET["orderId"]?>"><button class="btn btn-success pull-right">Confirm</button></a>
							<a href="?cancelID=<?=$_GET["orderId"]?>"><button class="btn btn-danger pull-right">Cancel</button></a> -->
							<?php
							
						}else{

							?>
							<!-- <a href="?cancelID=<?=$_GET["orderId"]?>"><button class="btn btn-success pull-right">Cancel</button></a> -->
							<?php
						}
					}

				?>

				



				<?php
					$sql1 = "SELECT * FROM `customer_ticket` INNER JOIN fishingplace ON (customer_ticket.fishingPlaceID=fishingplace.ID) WHERE `order_id`=".$_GET["orderId"];
					$bookingOrderResult = $con->query( $sql1 );

					$total = 0;

					if ( $bookingOrderResult->num_rows > 0 ) {

				?>

						<table class="table table-striped w-auto">
							<!--Table head-->
							<thead>
							    <tr>
							    <th>No</th>
							    <th>Order ID</th>
							    <th>Place Name</th>
							    <th>Ticket Type</th>
							    <th>Price</th>
							    </tr>
							</thead>
							 <!--Table head-->

						  	<!--Table body-->
							 <tbody>
							 	<?php
							 		$no=0;
							 		foreach($bookingOrderResult as $row){
							 			$no+=1;
							 	?>
								 	<tr class="table-info">
								 		<th><?=$no?></th>
								      <th scope="row"><?=$row["order_id"]?></th>
								      <td><?=$row["name"]?></td>
									   <?php if ($row["ticket_type"]==1) { $total	+= $row["price"] ?>
									   	<td>Normal</td>
									   	<td><?=$row["price"]?></td>
									   <?php }elseif ($row["ticket_type"]==2) { $total	+= $row["price"]*1.5 ?>
									   	<td>Standard</td>
									   	<td><?=$row["price"]*1.5?></td>
									   <?php }else{ $total	+= $row["price"]*2 ?>
									   	<td>VIP</td>
									   	<td><?=$row["price"]*2?></td>
									   <?php } ?>
								    </tr>
								<?php
							 		}
							 	?>
							 		<tr>
							 			<th colspan="3"></th>
							 			<th>Total: </th>
							 			<th><?=$total?></th>
							 		</tr>
							 </tbody>
							  <!--Table body-->
						</table>
						<!--Table-->


				<?php

					}else{

					}

				?>	
			</div><!-- Row /- -->
		</div>
	</div><!-- /.place-detail -->


 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->