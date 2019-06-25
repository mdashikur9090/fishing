

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


<div class="container" style="margin-top: 170px">
	<!-- Row -->

	<div class="row shop">

		<?php if(isset($_SESSION["productDeleteStatus"])){ ?>
			<div class="alert alert-success" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong> <?=$_SESSION["productDeleteStatus"]?>
			</div>
			<script>
				window.setTimeout(function() {
				    $(".alert").fadeTo(500, 0).slideUp(500, function(){
				        $(this).remove(); 
				    });
				}, 4000);
			</script>
			
		<?php
			unset($_SESSION["productDeleteStatus"]);
			}
		
		?>

		<div class="col-md-8 col-sm-7 col-xs-12 content-area">
			<ul class="products">

				<?php
				
				if(isset($_GET["searchByCatName"])){
						$sql="SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=product.ID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=product.ID) AS totalStar FROM `product` INNER JOIN catagory ON (product.catagory_id=catagory.ID) WHERE catagory.name='".$_GET["searchByCatName"]."'";
				}else{
						$sql = "SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=product.ID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=product.ID) AS totalStar FROM `product`";
					}


				$result = $con->query( $sql );
				if ( $result->num_rows > 0 ) {

					//$size=	$result->num_rows;			
					//for($x=0;$x<$size;$x++){
					foreach ( $result as $row ) {
						$name = $row[ "name" ];
						$description = $row[ "Description" ];
						$image = $row[ "img" ];
						$buyprice = $row[ "buyPrice" ];
						$hireprice = $row[ "hirePrice" ];
						$id = $row[ "ID" ];

						if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
							$star = round($row["totalStar"]/$row["toralRatePerson"]);
						}else{
							$star = 0;
						}

						?>


						<!-- Product -->
						<li class="product">
							<a href="#">
								<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Product" />
								<h3 class="txt-limit" data-limit-count="25" ><?=$name?></h3>
								<div class="star-rating">
									<?php if($star>=1){?><i class="fa fa-star"></i>
									<?php }else{ ?> <i class="fa fa-star muted"></i> 
									<?php } ?> 

									<?php if($star>=2){?><i class="fa fa-star"></i>
									<?php }else{ ?> <i class="fa fa-star muted"></i> 
									<?php } ?> 

									<?php if($star>=3){?><i class="fa fa-star"></i>
									<?php }else{ ?> <i class="fa fa-star muted"></i> 
									<?php } ?> 

									<?php if($star>=4){?><i class="fa fa-star"></i>
									<?php }else{ ?> <i class="fa fa-star muted"></i> 
									<?php } ?> 

									<?php if($star>=5){?><i class="fa fa-star"></i>
									<?php }else{ ?> <i class="fa fa-star muted"></i> 
									<?php } ?> 
								</div>
								<p class="txt-limit" data-limit-count="150"><?=$description?></p>
								<span class="price">Buy price: <?=$buyprice?></span><br>
								<span class="price">Hire price: <?=$hireprice?></span><br>
							</a>
						
							<div class="wishlist-box">
								<a onClick="product_remove(<?=$id?>)"><i class="addto-cart"></i>Delete</a>

							</div>
							<a href="<?=$_SESSION["directory"]?>admin/Edit.php?ID=<?=$id?>"  class="addto-cart" title="Add To Cart">Edit</a>
						</li>
						<!-- Product /- -->

				<?php
					}
				}

				?>
			</ul>
		</div>	
		<div class="col-md-4 col-sm-5 col-xs-12 widget-area">
			<!-- Widget Categories -->
			<aside class="widget widget_categories">
				<h3 class="widget-title">CATEGORIES <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"> add catagory </button></h3>

				<ul>
					<?php
					$sql2 = "SELECT * FROM `catagory`";
					$result1 = $con->query( $sql2 );
					if ( $result1->num_rows > 0 ) {
						foreach ( $result1 as $row ) {
							$Cat_name = $row[ "name" ];
							$Cat_ID = $row[ "ID" ];

							?>
					<li>
						<a href="<?=$_SESSION["directory"]?>admin/Edit_product.php?searchByCatName=<?=$Cat_name?>" ><?=$Cat_name?> </a>
						<a onClick="mycatagory(<?=$Cat_ID?>)"><img  src="<?=$_SESSION["directory"]?>img/delete.png" style="max-height: 20px; max-width: 20px; float: right; cursor:pointer;"  name="deltImg"></a>
					</li>
					<?php
					}
					//echo("Cat_name");
					}
					?>
				</ul>
			</aside>
			<!-- Widget Categories /- -->
			
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addcatagory.php" method="post">
      <div class="modal-body">
       <input name="catagory"  class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="AddCat" class="btn btn-primary " value="Save">
      </div>
      </form>
    </div>
  </div>
</div>




<!-- Footer Section -->
<?php

include( "../footer.php" );
?>
<!-- Footer Section /- -->


<script>
function product_remove(id){
	var chk=confirm("do you want to delete");
	if(chk==true){
		 
		location.href="<?=$_SESSION["directory"]?>admin/productRemove.php?product_id="+id;
	}
}
	
function mycatagory(id){
	var chk=confirm("do you want to delete");
	if(chk==true){
		location.href="<?=$_SESSION["directory"]?>admin/addcatagory.php?Cat_id="+id;
	}
}

</script>