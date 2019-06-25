<?php include("../header.php"); ?>
<?php
if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==0)){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>	
<?php

include("../dbCon.php");
$con=connection();


//buy product			
$buyProduct = [];
for ($i=1; $i < 6 ; $i++) { 
	$buyproductSQL = "SELECT topProduct.ProductID, topProduct.name, MAX(topProduct.qty) as qty FROM (SELECT buyproduct.ProductID, product.name, SUM(buyproduct.quantity) AS qty FROM `order` 
		INNER JOIN buyproduct ON (order.ID=buyproduct.OrderID) 
		INNER JOIN product ON (buyproduct.ProductID=product.ID) 
		WHERE `date_time` > '2019-0".$i."-01 00:00:01' 
		AND `date_time` < '2019-0".$i."-30 23:59:59' 
		GROUP BY buyproduct.ProductID
		Order BY qty DESC) as topProduct";

	
	$buyProductResult=$con->query($buyproductSQL);
	if($buyProductResult->num_rows>0){
		foreach($buyProductResult as $row){

			$buyProduct[] = array("ProductID" => $row["ProductID"], "name" => $row["name"], "qty" => $row["qty"], "date" => '0'.$i.'-2019' ); 

		}
	}

}


//buy product			
$hireProduct = [];
for ($i=1; $i < 6 ; $i++) { 
	$hireProductSQL = "SELECT topProduct.ProductID, topProduct.name, MAX(topProduct.qty) as qty FROM (SELECT hireproduct.ProductID, product.name, SUM(hireproduct.qty) AS qty FROM `order` 
		INNER JOIN hireproduct ON (order.ID=hireproduct.OrderID) 
		INNER JOIN product ON (hireproduct.ProductID=product.ID) 
		WHERE `date_time` > '2019-0".$i."-01 00:00:01' 
		AND `date_time` < '2019-0".$i."-30 23:59:59' 
		GROUP BY hireproduct.ProductID
		Order BY qty DESC) as topProduct";

	
	$hireProductResult=$con->query($hireProductSQL);
	if($hireProductResult->num_rows>0){
		foreach($hireProductResult as $row){

			$hireProduct[] = array("ProductID" => $row["ProductID"], "name" => $row["name"], "qty" => $row["qty"], "date" => '0'.$i.'-2019' ); 

		}
	}

}


//place			
$place = [];
for ($i=1; $i < 6 ; $i++) { 
	$placeSQL = "SELECT topPlace.fishingPlaceID, topPlace.name, MAX(topPlace.qty) as qty FROM (SELECT customer_ticket.fishingPlaceID, fishingplace.name, SUM(customer_ticket.role) AS qty FROM `order` 
		INNER JOIN customer_ticket ON (order.ID=customer_ticket.order_id) 
		INNER JOIN fishingplace ON (customer_ticket.fishingPlaceID=fishingplace.ID) 
		WHERE `date_time` > '2019-0".$i."-01 00:00:01' 
		AND `date_time` < '2019-0".$i."-30 23:59:59' 
		GROUP BY customer_ticket.fishingPlaceID
		Order BY qty DESC) as topPlace";

	
	$placeResult=$con->query($placeSQL);
	if($placeResult->num_rows>0){
		foreach($placeResult as $row){

			$place[] = array("fishingPlaceID" => $row["fishingPlaceID"], "name" => $row["name"], "qty" => $row["qty"], "date" => '0'.$i.'-2019' ); 

		}
	}

}


?>

<div class="place-detail product">
	<div class="container">
		<div class="section-header">
			<h3>Monthly highest buy product sell reports </h3>
		</div><!-- Section Header /- -->

			<!--Table-->
			<table class="table table-striped w-auto">

			  <!--Table head-->
			  <thead>
			    <tr>
			      <th>Date</th>
			      <th>Produt ID</th>
			      <th>Name</th>
			      <th>Quanity </th>
			    </tr>
			  </thead>
			  <!--Table head-->

			  <!--Table body-->
			 <tbody>

				<?php 
					foreach($buyProduct as $row){
				?>
					    <tr class="table-info">
					      <th scope="row"><?=$row["date"]?></th>
					      <td><?=$row["ProductID"]?></td>
					      <td><?=$row["name"]?></td>
					      <td><?=$row["qty"]?></td>
					    </tr>

				<?php
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
			<h3>Monthly highest hire product sell reports </h3>
		</div><!-- Section Header /- -->

			<!--Table-->
			<table class="table table-striped w-auto">

			  <!--Table head-->
			  <thead>
			    <tr>
			      <th>Date</th>
			      <th>Produt ID</th>
			      <th>Name</th>
			      <th>Quanity </th>
			    </tr>
			  </thead>
			  <!--Table head-->

			  <!--Table body-->
			 <tbody>

				<?php 
					foreach($hireProduct as $row){
				?>
					    <tr class="table-info">
					      <th scope="row"><?=$row["date"]?></th>
					      <td><?=$row["ProductID"]?></td>
					      <td><?=$row["name"]?></td>
					      <td><?=$row["qty"]?></td>
					    </tr>

				<?php
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
			<h3>Monthly highest hire product sell reports </h3>
		</div><!-- Section Header /- -->

			<!--Table-->
			<table class="table table-striped w-auto">

			  <!--Table head-->
			  <thead>
			    <tr>
			      <th>Date</th>
			      <th>Produt ID</th>
			      <th>Name</th>
			      <th>Quanity </th>
			    </tr>
			  </thead>
			  <!--Table head-->

			  <!--Table body-->
			 <tbody>

				<?php 
					foreach($place as $row){
				?>
					    <tr class="table-info">
					      <th scope="row"><?=$row["date"]?></th>
					      <td><?=$row["fishingPlaceID"]?></td>
					      <td><?=$row["name"]?></td>
					      <td><?=$row["qty"]?></td>
					    </tr>

				<?php
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

	include("../footer.php");
	?>
	<!-- Footer Section /- -->