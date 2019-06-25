<?php
include( "../header.php" );
include( "../dbCon.php" );
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
?>

<!-- Page Header -->
<div class="container-fluid no-padding page-header" style="margin-top: 200px;">
	<div class="container">
		<ol class="breadcrumb">
			<li>Order Items </li>
		</ol>
	</div>
</div> <!-- Page Header /- -->
<div class="padding-80"></div>




<!-- Cart -->
<div class="woocommerce-cart container-fluid no-left-padding no-right-padding">
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<!-- Cart Table -->
				<div class="col-md-12 col-sm-12 col-xs-12 cart-table">


					<?php
						$sql1 = "SELECT buyproduct.OrderID, ProductID, img, quantity, `name`, `buyPrice` FROM `buyproduct` INNER JOIN product ON (buyproduct.ProductID=product.ID) WHERE `OrderID`=".$_GET["orderId"];
						$sql2 = "SELECT hireproduct.OrderID, ProductID, img, qty, `name`, `hirePrice`, days FROM `hireproduct` INNER JOIN product ON (hireproduct.ProductID=product.ID) WHERE `OrderID`=".$_GET["orderId"];
						$buyproducResult = $con->query( $sql1 );
						$hireproductResult = $con->query( $sql2 );

						if ( $buyproducResult->num_rows > 0 ) {

					?>

						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th class="product-thumbnail">Order ID</th>
									<th class="product-name">Img</th>
									<th class="product-name">Product Name</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-unit-price">Unit Price</th>
									<th class="product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
							
								<?php
									$total =0;

										foreach($buyproducResult as $row){ 
											$total+=$row["buyPrice"];
													
								?>		 
												
											<tr>
											   <td><?=$row["OrderID"]?></td>
											   <td><a href="#"><img src="<?=$_SESSION["directory"]?>img/<?=$row["img"]?>" alt="Product" /></a></td>
											   <td><?=$row["name"]?></td>
											   <td><?=$row["quantity"]?></td>
											   <td><?=$row["buyPrice"]?></td>
											   <td><?=$row["buyPrice"]*$row["quantity"]?></td>
										   	</tr>
												
								
								<?php
										}


								?>

								<tr>
								   <td colspan="4" >Total: </td>
								   <td colspan="4" ><?=$total?></td>
							   	</tr>
							
							</tbody>
						</table>

					<?php
						}elseif( $hireproductResult->num_rows > 0 ){
					?>

						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th class="product-thumbnail">Order ID</th>
									<th class="product-name">Product ID</th>
									<th class="product-name">Product Name</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-quantity">Days</th>
									<th class="product-unit-price">Unit Price</th>
									<th class="product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
							
								<?php
									$total =0;

										foreach($hireproductResult as $row){ 
											$total+=$row["hirePrice"]*$row["days"];
													
								?>		 
												
											<tr>
											   <td><?=$row["OrderID"]?></td>
											   <td><a href="<?=$_SESSION["directory"]?>customer/product-details.php?productID=<?=$row["ProductID"]?>"><img src="<?=$_SESSION["directory"]?>img/<?=$row["img"]?>" alt="Product" /></a></td>
											   <td><?=$row["name"]?></td>
											   <td><?=$row["qty"]?></td>
											   <td><?=$row["days"]?></td>
											   <td><?=$row["hirePrice"]?></td>
											   <td><?=$row["hirePrice"]*$row["qty"]?></td>
										   	</tr>
												
								
								<?php
										}


								?>

								<tr>
								   <td colspan="5" >Total: </td>
								   <td colspan="2" ><?=$total?></td>
							   	</tr>
							
							</tbody>
						</table>

					<?php

						}else{

						}

					?>
					
						
				</div>
		</div>
		<!-- Row /- -->
	</div>
	<!-- Container /- -->
</div> <!-- Cart /- -->




<!-- Footer Section -->
<?php

include( "../footer.php" );
?>
<!-- Footer Section /- -->

