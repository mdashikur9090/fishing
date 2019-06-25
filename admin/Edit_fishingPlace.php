<?php
	include( "../header.php" );
	include( "../dbCon.php" );
	$con = connection();
	if ( isset( $_SESSION[ "PackDelete" ] ) ) {
		echo( $_SESSION[ "PackDelete" ] );
		unset( $_SESSION[ "PackDelete" ] );
	}

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
		<div class="col-md-12 col-sm-12 col-xs-12">

			<?php if(isset($_SESSION["msg"])){ ?>
				<div class="alert alert-success" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Success!</strong> <?=$_SESSION["msg"]?>
				</div>
				<script>
					window.setTimeout(function() {
					    $(".alert").fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 4000);
				</script>
				
			<?php
				unset($_SESSION["msg"]);
				}
			
			?>

			<ul class="products">

				<?php
					$sql = "SELECT fishingplace.*, (SELECT COUNT(ID) FROM place_rating WHERE place_rating.fishingPlaceID=fishingplace.ID) AS toralRatePerson, (SELECT SUM(star) FROM place_rating WHERE place_rating.fishingPlaceID=fishingplace.ID) AS totalStar FROM `fishingplace` WHERE `role`=0";
					$result = $con->query( $sql );
					if ( $result->num_rows > 0 ) {

						foreach ( $result as $row ) {
						$id = $row[ "ID" ];
						$name = $row[ "name" ];
						$Description = $row[ "Description" ];
						$TotalSeat = $row[ "TotalSeat" ];
						$price = $row[ "price" ];
						$location = $row[ "Location" ];
						$image = $row[ "image" ];
						$fromDate = $row[ "fromDate" ];
						$toDate = $row[ "toDate" ];

						if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
							$star = round($row["totalStar"]/$row["toralRatePerson"]);
						}else{
							$star = 0;
						}
				
				?>

						<!-- Product -->
						<li class="product">
							<a href="#">
								<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="image"  style="max-height: 150px; max-width: 200px; left: 20%;" />
								<h3><?=$name?></h3>
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
								<p class="txt-limit" data-limit-count="150"><?=$Description?></p>
								<span class="price">Ticket price: <?=$price?></span>
								<p>Total seat: <?=$TotalSeat?></p>
								<p>From Date: <?=$fromDate?></p>
								<p>ToDate: <?=$toDate?></p>
								<span class="price">Location: <?=$location?></span>
							</a>
						
							<div class="wishlist-box">
								<a style="cursor: pointer;" onClick="place_remove(<?=$id?>)"><i class="addto-cart"></i>Delete</a>

							</div>
							<a href="<?=$_SESSION["directory"]?>admin/Edit_fishingPlaceChecker.php?ID=<?=$id?>"  class="addto-cart" title="Add To Cart">Edit</a>
						</li>
						<!-- Product /- -->

					<?php
						}
					}

					?>

			</ul>
		</div>	
	</div>
</div>





<!-- Footer Section -->
<?php

include( "../footer.php" );
?>
<!-- Footer Section /- -->


<script>
function place_remove(id){
	var chk=confirm("do you want to delete");
	
	if(chk==true){
		location.href="<?=$_SESSION["directory"]?>admin/DeletefishingplaceChecker.php?msg="+id;
	}
		
}

</script>