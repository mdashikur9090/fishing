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
			<li> Hire</li>
			<li>Cart</li>
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

				<?php if(isset($_SESSION["confirmMsg"])){ ?>

					<div class="alert alert-success" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Success!</strong> <?=$_SESSION["confirmMsg"]?>
					</div>
					<script>
						window.setTimeout(function() {
						    $(".alert").fadeTo(2000, 0).slideUp(2000, function(){
						        $(this).remove(); 
						    });
						}, 4000);
					</script>
					
				<?php
					unset($_SESSION["confirmMsg"]);
					}
				
				?>
		</div>

			<form action="hireOrderCheckout.php" method="post">
				<table class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th class="product-thumbnail">Item</th>
							<th class="product-name">Product Name</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-quantity">Day</th>
							<th class="product-unit-price">Unit Price/day</th>
							<th class="product-subtotal">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$userID = $_SESSION[ "userid" ];
						$sql = "SELECT * FROM `cart` WHERE `userID`=$userID AND `hireId`=1";
						$result = $con->query( $sql );
						if ( $result->num_rows > 0 ) {

							$total = 0;

							foreach ( $result as $row ) {

								$productID = $row[ "productID" ];
								$ID = $row[ "ID" ];
								$qty = $row[ "qty" ];
								$days = $row[ "days" ];
								$sql1 = "SELECT * FROM `product` WHERE `ID`=$productID";
								$result1 = $con->query( $sql1 );
								//echo($sql1);
								if ( $result1->num_rows > 0 ) {
									foreach ( $result1 as $row1 ) {
										$name = $row1[ "name" ];
										$image = $row1[ "img" ];
										$hirePrice = $row1[ "hirePrice" ];

										//calculate total
										$total+=$hirePrice*$qty;

										?>

 
										<tr class="cart_item">
											<td data-title="Item" class="product-thumbnail">
												<a href="#"><img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Product" /></a>
											</td>
											<td  data-title="Product Name" class="product-name">
												<a href="product-details.php?productID=<?=$productID?>">
													<?=$name?>
												</a>
											</td>
											<td  data-title="Quantity" class="product-quantity">
												<div class="prd-quantity" data-title="Quantity">
													<input name="productId[]" value="<?=$productID?>" type="hidden">
													<input onclick="minusQty($(this), <?=$productID?>)" value="-" class="btn" type="button">
													<input name="quantity[]" value="<?=$qty?>" type="text" readonly >
													<input onclick="plusQty($(this), <?=$productID?>)" value="+" class=" btn" type="button">
												</div>
											</td>
											<td data-title="Quantity" class="product-quantity">
												<div class="prd-quantity" data-title="Quantity">
													<input onclick="minusDay($(this), <?=$productID?>)" value="-" class="btn" type="button">
													<input name="days[]" value="<?=$days?>" type="text" readonly >
													<input onclick="plusDay($(this), <?=$productID?>)" value="+" class=" btn" type="button">
													
												</div>
											</td>
											<div>
												<td data-title="Unit Price" class="product-unit-price">
													<p><?=$hirePrice?></p>
												</td>
												<td data-title="Total" class="product-subtotal">
													<p class="totaltaka"><?=$hirePrice*$qty?></p>
												</td>
											</div>

											<td data-title="Remove" class="product-remove">
												<a onclick="remove(<?=$ID?>)" ><i class="icon icon-Delete"></i></a>
											</td>
										</tr>

						<?php
										}
									}

								}
							}

						?>
					 
					</tbody>
				</table>
				
				

				<!-- Coupon -->
				<div class="col-md-offset-4 col-md-4 col-sm-6 col-xs-6 coupon">
					<!-- <div class="coupon-box">
						<h4>coupon code</h4>
						<h6>If You Have A Coupon Code Enter Here</h6>
						<form action="" method="GET">
							<input type="text" class="form-control" placeholder="Coupon Code"/>
							<input type="submit" value="apply code"/>
						</form>
					</div> -->
				</div>
				<!-- Coupon /- -->

				<!-- Coupon /- -->
				<div class="col-md-4 col-sm-6 col-xs-6 cart-collaterals">
					<div class="cart_totals">
						<h3>cart totals</h3>
						<table>
							<tr>
								<th>Sub Total</th>
								<?php if (isset($total)) { ?>
									<td id="subTotal"><?=$total?></td>
								<?php }else{ ?>
									<td id="subTotal">0</td>
								<?php } ?>
							</tr>
							<tr>
								<th>Shipping</th>
								<td>Free</td>
							</tr>
							<tr>
								<th>Grand Total</th>
								<?php if (isset($total)) { ?>
									<td id="grandTotal"><?=$total?></td>
								<?php }else{ ?>
									<td id="grandTotal">0</td>
								<?php } ?>
							</tr>
						</table>
						<input type="hidden" id="inInput" name="total" value="<?=$total?>">
						<div class="coupon coupon-box">
							<?php if($result->num_rows>0){ ?>
								<button type="submit" class="checkout" >Proceed to Checkout</button>
							<?php }else{ ?>
								<button type="submit" disabled class="checkout" >Proceed to Checkout</button>
							<?php } ?>
						</div>
					</div>
				</div>
				
			</form>
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




<script>
	function plusQty( tag, productID ) {
		 
		tag.closest( 'div' ).find( ":nth-child(3)" ).val( parseInt( tag.closest( 'div' ).find( ":nth-child(3)" ).val() ) + 1 );
		var qty = parseInt(tag.closest('tr').find('td:nth-child(3) div input:nth-child(3)').val());
		var day = parseInt(tag.closest('tr').find('td:nth-child(4) div input:nth-child(2)').val());
		var price = parseInt(tag.closest('tr').find('td:nth-child(5) p').text());
		var total = parseInt(tag.closest('tr').find('td:nth-child(6) p').text());
		
		var subTotal = parseInt($('#subTotal').text());
		var grandTotal = parseInt($('#grandTotal').text());
		
		tag.closest('tr').find('td:nth-child(6) p').text(qty*day*price);
		$('#subTotal').text(subTotal+(day*price));
		$('#grandTotal').text(subTotal+(day*price));

		document.getElementById("inInput").value =subTotal+price;

		$.ajax({
	          url: 'manage_qty.php',
	          type: 'POST',
	          data: {productID: productID, hire: true, plus: true},
         })
         .done(function(response){
          console.log(response);

         })
         .fail(function(){
          
      	});
		
		

	}

	function minusQty( tag, productID ) {
		 
		var qty = parseInt(tag.closest('div').find(":nth-child(3)").val());

		if ( qty > 1 ) {

			tag.closest( 'div' ).find( ":nth-child(3)" ).val( parseInt( tag.closest( 'div' ).find( ":nth-child(3)" ).val() ) - 1 );
			var qty = parseInt(tag.closest('tr').find('td:nth-child(3) div input:nth-child(3)').val());
			var day = parseInt(tag.closest('tr').find('td:nth-child(4) div input:nth-child(2)').val());
			var price = parseInt(tag.closest('tr').find('td:nth-child(5) p').text());
			var total = parseInt(tag.closest('tr').find('td:nth-child(6) p').text());
			
			var subTotal = parseInt($('#subTotal').text());
			var grandTotal = parseInt($('#grandTotal').text());
			
			tag.closest('tr').find('td:nth-child(6) p').text(qty*day*price);
			$('#subTotal').text(subTotal-(day*price));
			$('#grandTotal').text(subTotal-(day*price));

			document.getElementById("inInput").value =subTotal-price;

			$.ajax({
	          url: 'manage_qty.php',
	          type: 'POST',
	          data: {productID: productID, hire: true, minus: true},
	         })
	         .done(function(response){
	          console.log(response);

	         })
	         .fail(function(){
	          
	      	});

		}
		
	}

	function plusDay( tag, productID ) {
		 
		tag.closest( 'div' ).find( ":nth-child(2)" ).val( parseInt( tag.closest( 'div' ).find( ":nth-child(2)" ).val() ) + 1 );
		var qty = parseInt(tag.closest('tr').find('td:nth-child(3) div input:nth-child(3)').val());
		var day = parseInt(tag.closest('tr').find('td:nth-child(4) div input:nth-child(2)').val());
		var price = parseInt(tag.closest('tr').find('td:nth-child(5) p').text());
		var total = parseInt(tag.closest('tr').find('td:nth-child(6) p').text());
		
		var subTotal = parseInt($('#subTotal').text());
		var grandTotal = parseInt($('#grandTotal').text());
		
		tag.closest('tr').find('td:nth-child(6) p').text(qty*day*price);
		$('#subTotal').text(subTotal+(qty*price));
		$('#grandTotal').text(subTotal+(qty*price));


		$.ajax({
          url: 'manage_days.php',
          type: 'POST',
          data: {productID: productID, plus: true},
         })
         .done(function(response){
          console.log(response);

         })
         .fail(function(){
          
      	});
	

	}

	function minusDay( tag, productID ) {

		var day = parseInt(tag.closest('div').find(":nth-child(2)").val());

		if ( day > 1 ) {

			tag.closest( 'div' ).find( ":nth-child(2)" ).val( parseInt( tag.closest( 'div' ).find( ":nth-child(2)" ).val() ) - 1 );
			var qty = parseInt(tag.closest('tr').find('td:nth-child(3) div input:nth-child(3)').val());
			var day = parseInt(tag.closest('tr').find('td:nth-child(4) div input:nth-child(2)').val());
			var price = parseInt(tag.closest('tr').find('td:nth-child(5) p').text());
			var total = parseInt(tag.closest('tr').find('td:nth-child(6) p').text());
			
			var subTotal = parseInt($('#subTotal').text());
			var grandTotal = parseInt($('#grandTotal').text());
			
			var subTotal = parseInt($('#subTotal').text());
			var grandTotal = parseInt($('#grandTotal').text());
			
			tag.closest('tr').find('td:nth-child(6) p').text(qty*day*price);
			$('#subTotal').text(subTotal-(qty*price));
			$('#grandTotal').text(subTotal-(qty*price));


			$.ajax({
	          url: 'manage_days.php',
	          type: 'POST',
	          data: {productID: productID, minus: true},
	         })
	         .done(function(response){
	          console.log(response);

	         })
	         .fail(function(){
	          
	      	});

		}
		
	}


	
	
	function remove(id){
		var r = confirm("Are You sure to remove this item? If yes pleas ok to confirm.");
		if (r == true) {
		  location.href="DeletecardCheck.php?id="+id+"&cartType=hireCard";
		} 
		
	}
	
</script>