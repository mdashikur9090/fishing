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
						$sql = "SELECT * FROM `customer_ticket` INNER JOIN fishingplace on 	(customer_ticket.fishingPlaceID=fishingplace.ID) WHERE  `order_id`=".$_GET["orderId"];
						$ticketOrderResult = $con->query( $sql );

						

					?>

						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th class="product-thumbnail">Order ID</th>
									<th class="product-name">Place Name</th>
									<th class="product-quantity">Ticket Type</th>
									<th class="product-unit-price">Price</th>
								</tr>
							</thead>
							<tbody>
							
								<?php
									$total =0;

										foreach($ticketOrderResult as $row){ 
											$total+=$row["price"];
													
								?>		 
												
											<tr>
											   <td><?=$_GET["orderId"]?></td>
											   <td><?=$row["name"]?></td>
											   <?php if ($row["ticket_type"]==1) { ?>
											   	<td>Normal</td>
											   <?php }elseif ($row["ticket_type"]==2) { ?>
											   	<td>Standard</td>
											   <?php }else{ ?>
											   	<td>VIP</td>
											   <?php } ?>
											   <td><?=$row["price"]?></td>
										   	</tr>
												
								
								<?php
										}


								?>

								<tr>
								   <td colspan="3" >Total: </td>
								   <td colspan="1" ><?=$total?></td>
							   	</tr>
							
							</tbody>
						</table>
					
						
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

