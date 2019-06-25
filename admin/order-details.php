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
		$sq2 = "DELETE FROM `buyproduct` WHERE OrderID=".$_GET["cancelID"];
		$sq3 = "DELETE FROM `hireproduct` WHERE OrderID=".$_GET["cancelID"];

		$con->query( $sql );
		$con->query( $sq2 );
		$con->query( $sq3 );

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
				<h3>Order Details </h3>
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
							<a href="?confirmID=<?=$_GET["orderId"]?>"><button class="btn btn-success pull-right">Confirm</button></a>
							<?php
							
						}else{

							?>
							<a href="?cancelID=<?=$_GET["orderId"]?>"><button class="btn btn-success pull-right">Cancel</button></a>
							<?php
						}
					}

				?>

				



				<?php
					$sql1 = "SELECT `OrderID`, `ProductID`, `quantity`, name, buyPrice  FROM `buyproduct` INNER JOIN product ON (buyproduct.ProductID=product.ID) WHERE `OrderID`=".$_GET["orderId"];
					$sql2 = "SELECT `OrderID`, `ProductID`, qty, `days`, name, hirePrice FROM `hireproduct` INNER JOIN product ON (hireproduct.ProductID=product.ID) WHERE `OrderID`=".$_GET["orderId"];
					$buyproducResult = $con->query( $sql1 );
					$hireproductResult = $con->query( $sql2 );

					$total = 0;

					if ( $buyproducResult->num_rows > 0 ) {

				?>

						<table class="table table-striped w-auto">
							<!--Table head-->
							<thead>
							    <tr>
							    <th>Order ID</th>
							    <th>Product ID</th>
							    <th>Product Name</th>
							    <th>QTY</th>
							    <th>Price</th>
							    <th>Total</th>
							    </tr>
							</thead>
							 <!--Table head-->

						  	<!--Table body-->
							 <tbody>
							 	<?php
							 		foreach($buyproducResult as $row){
							 			$total	+= $row["quantity"]*$row["buyPrice"];
							 	?>
								 	<tr class="table-info">
								      <th scope="row"><?=$row["OrderID"]?></th>
								      <td><?=$row["ProductID"]?></td>
								      <td><?=$row["name"]?></td>
								      <td><?=$row["quantity"]?></td>
								      <td><?=$row["buyPrice"]?></td>
								      <td><?=$row["quantity"]*$row["buyPrice"]?></td>
								    </tr>
								<?php
							 		}
							 	?>
							 		<tr>
							 			<th colspan="4"></th>
							 			<th>Total: </th>
							 			<th><?=$total?></th>
							 		</tr>
							 </tbody>
							  <!--Table body-->
						</table>
						<!--Table-->

				<?php


					}elseif( $hireproductResult->num_rows > 0 ){
				?>

						
						<table class="table table-striped w-auto">
							<!--Table head-->
							<thead>
							    <tr>
							    <th>Order ID</th>
							    <th>Product ID</th>
							    <th>Product Name</th>
							    <th>QTY</th>
							    <th>Days</th>
							    <th>Price</th>
							    <th>Total</th>
							    </tr>
							</thead>
							 <!--Table head-->

						  	<!--Table body-->
							 <tbody>
							 	<?php
							 		foreach($hireproductResult as $row){
							 			$total	+= $row["qty"]*$row["hirePrice"]*$row["days"];
							 	?>
								 	<tr class="table-info">
								      <th scope="row"><?=$row["OrderID"]?></th>
								      <td><?=$row["ProductID"]?></td>
								      <td><?=$row["name"]?></td>
								      <td><?=$row["qty"]?></td>
								      <td><?=$row["days"]?></td>
								      <td><?=$row["hirePrice"]?></td>
								      <td><?=$row["qty"]*$row["hirePrice"]*$row["days"]?></td>
								    </tr>
								<?php
							 		}
							 	?>
							 		<tr>
							 			<th colspan="5"></th>
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