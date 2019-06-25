<?php include("../header.php");
include("../dbCon.php");
$con=connection();
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


<!-- Page Header -->
<div class="container-fluid no-padding page-header" style="margin-top: 200px;">
	<div class="container">
		<ol class="breadcrumb">
			<li>place	</li>
			<li class="active">request</li>
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
				<form>
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								 
								<th class="product-name">Product Name</th>
								 
								<th class="product-name">Location</th>
								<th class="product-name">Comment</th>
								<th class="product-name">User ID</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody>
						
							<?php

								//$userID=$_SESSION["userid"];
								$sql="SELECT * FROM `request_place`";
								$result=$con->query($sql);
								if($result->num_rows>0){

									foreach($result as $row){ 
										$id=$row["ID"];
										$name=$row["name"];
										$location=$row["location"];
										$comment=$row["comment"];
										$userID=$row["userID"];
										 
												
										?>		 
											
											
							<tr class="cart_item">
								 
								<td data-title="Product Name" class="product-name"><?=$name?>
								</td>
								 
								<div>
									<td data-title="Product Name" class="product-name"><p><?=$location?></p></td>
									<td data-title="Product Name" class="product-name"><p><?=$comment?></p> </td>
								</div>
								
								<td data-title="Product Name" class="product-name"> <?=$userID?> </td>
								<td data-title="Remove" class="product-remove"><a onClick="deleteRequest('<?=$id?>')" ><i class="icon icon-Delete"></i></a>
								</td>
							</tr>
							
							<?php
										 

									}
								}

							?>
						
						</tbody>
					</table>
				</form>
			</div>
			<!-- Cart Table /- -->
	 
			
		</div>
		<!-- Row /- -->
	</div>
	<!-- Container /- -->
</div> <!-- Cart /- -->
<!-- Page Header -->
<div class="container-fluid no-padding page-header">
	<div class="container">
		<ol class="breadcrumb">
			<li>Kits Or tool	</li>
			<li class="active">Request</li>
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
				<form>
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								 
								<th class="product-name">Kit Name</th>
								 
								<th class="product-name">Brand</th>
								<th class="product-name">Comment</th>
								<th class="product-name">User ID</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody>
						
							<?php

								//$userID=$_SESSION["userid"];
								$sql="SELECT * FROM `request_kit`";
								$result=$con->query($sql);
								if($result->num_rows>0){

									foreach($result as $row){ 
										$id=$row["ID"];
										$name=$row["name"];
										$brand=$row["brand"];
										$comment=$row["comment"];
										$userID=$row["userId"];
										 
												
										?>		 
											
											
							<tr class="cart_item">
								 
								<td data-title="Product Name" class="product-name"><?=$name?>
								</td>
								 
								<div>
									<td data-title="Product Name" class="product-name"><p><?=$brand?></p></td>
									<td data-title="Product Name" class="product-name"><p><?=$comment?></p> </td>
								</div>
								
								<td data-title="Product Name" class="product-name"> <?=$userID?> </td>
								<td data-title="Remove" class="product-remove"><a onClick="deleteKit('<?=$id?>')" ><i class="icon icon-Delete"></i></a>
								</td>
							</tr>
							
							<?php
										 

									}
								}

							?>
						
						</tbody>
					</table>
				</form>
			</div>
			<!-- Cart Table /- -->

			
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

function deleteRequest(id){
	var chk=confirm("do you want to delete");
	if(chk==true){
		location.href="<?=$_SESSION["directory"]?>admin/DeleteCustomerRequestCheck.php?id="+id;
	}
}function deleteKit(id){
	var chk=confirm("do you want to delete");
	if(chk==true){
		location.href="<?=$_SESSION["directory"]?>admin/DeleteCustomerRequestCheck.php?kitid="+id;
	}
}

</script>