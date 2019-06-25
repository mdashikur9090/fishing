 <?php
 include( "../header.php" );
 include( "../dbCon.php" );
 $con = connection();

 ?>

	<div class="place-detail">
		<div class="container">
			
			<!-- Row -->
			<div class="row">
				<?php

					$placeID = $_GET["placeID"];

					$sql = "SELECT fishingplace.*, (SELECT COUNT(ID) FROM place_rating WHERE place_rating.fishingPlaceID=$placeID) AS toralRatePerson, (SELECT SUM(star) FROM place_rating WHERE place_rating.fishingPlaceID=$placeID) AS totalStar, (SELECT COUNT(ID) FROM customer_ticket WHERE customer_ticket.fishingPlaceID=$placeID) as totalTicket FROM `fishingplace` WHERE fishingplace.ID=$placeID";
					$result = $con->query( $sql );
					if ( $result->num_rows > 0 ) {

						foreach ( $result as $row ) {
						$placeID = $row[ "ID"];
						$name = $row[ "name"];
						$totalTicket = $row["totalTicket"];
						$aviableSeat = $row["TotalSeat"];
						$price = $row[ "price"];
						$description = $row[ "Description"];
						$image = $row[ "image"];
						$fromDate = $row["fromDate"];
						$toDate = $row["toDate"];
						$location = $row["Location"];
						$latitude = $row["latitude"];
						$longitude = $row["longitude"];

						if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
							$star = round($row["totalStar"]/$row["toralRatePerson"]);
						}else{
							$star = 0;
						}

					?>	

					<div class="col-lg-9">
						<!-- Section Header -->
						<div class="section-header">
							<h3>All Places</h3>
						</div><!-- Section Header /- -->

						<article class="the_post">

							<?php if(isset($_SESSION["cartMsg"])){ ?>
								<div class="alert alert-success" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Success!</strong> <?=$_SESSION["cartMsg"]?>
								</div>
								<script>
									window.setTimeout(function() {
									    $(".alert").fadeTo(2000, 0).slideUp(2000, function(){
									        $(this).remove(); 
									    });
									}, 4000);
								</script>
								
							<?php
								unset($_SESSION["cartMsg"]);
								}
							
							?>


							<figure>
								<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Thumb">
							</figure>
							<h2 class="the_title"><?=$name?></h2>
							<div class="col-xs-12 tour-detail">
								<div class="star-rating text-center">
									<a href="place-ratting.php?fishingPlaceID=<?=$placeID?>&star=1"> 
										<?php if($star>=1){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="place-ratting.php?fishingPlaceID=<?=$placeID?>&star=2">
										<?php if($star>=2){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="place-ratting.php?fishingPlaceID=<?=$placeID?>&star=3">
										<?php if($star>=3){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="place-ratting.php?fishingPlaceID=<?=$placeID?>&star=4">
										<?php if($star>=4){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="place-ratting.php?fishingPlaceID=<?=$placeID?>&star=5">
										<?php if($star>=5){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
								</div>
								<div class="tour-time">
									<span></i> From <?=$fromDate?></span>
									<span></i> From <?=$toDate?></span>
								</div>
								<div class="tour-time">
									<span>Total Ticket:  <?=$totalTicket?></span>
									<span>Available Ticket: <?=$aviableSeat?></span>
								</div>
								<div class="tour-rate">
									<h5>Ticket Price <span>$<?=$price?></span></h5>
									<a href="BookPlace.php?id=<?=$placeID?>">Book <i class="fa fa-share-square-o"></i></a>
								</div>
							</div><!-- /.col-xs-12 -->
							<p><?=$description?></p>
							<div class="post_footer">
								<div id="google_map">
									<?php 

										$mapSrc="https://maps.google.com/maps?q=".$latitude.", ".$longitude."&hl=es;z=14&amp;output=embed";

									?>
									<iframe 
									  width="100%" 
									  height="400px" 
									  frameborder="0" 
									  scrolling="no" 
									  marginheight="0" 
									  marginwidth="0" 
									  src="<?=$mapSrc?>"
									 >
									 </iframe>
									 
								</div><!-- /#google_map -->
							</div><!-- /.post_footer -->
						</article>
					</div><!-- /.col-lg-9 -->
					<div class="col-lg-3" style="margin-top: 145px">
						<!-- Widget Popular Products -->
						<aside class="widget widget_popular_products">
							<h3 class="widget-title">You may also like</h3>
							<!-- Popular Product Box -->

							<?php 
						
								$sql1="SELECT fishingplace.*, (SELECT COUNT(ID) FROM place_rating WHERE place_rating.fishingPlaceID=fishingplace.ID) AS toralRatePerson, (SELECT SUM(star) FROM place_rating WHERE place_rating.fishingPlaceID=fishingplace.ID) AS totalStar FROM `fishingplace` ORDER BY `toDate` DESC LIMIT 5";
								$result1=$con->query($sql1);
								if($result1->num_rows>0){

									//$size=	$result->num_rows;			
								//for($x=0;$x<$size;$x++){
								foreach($result1 as $row){ 
									$id=$row["ID"];
									$name=$row["name"];
									$image=$row["image"];
									$price=$row["price"];
									$fromDate=$row["fromDate"];
									$toDate=$row["toDate"];

									if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
										$star = round($row["totalStar"]/$row["toralRatePerson"]);
									}else{
										$star = 0;
									}
							
							?>

									<div class="pp-box">
										<div class="product-img"><a href="place-details.php?placeID=<?=$id?>" title="Product"><img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Seller" /></a>
										</div>
										<h4><?=$name?> <span><?=$price?></span></h4>
										<h4>From Date <span><?=$fromDate?></span></h4>
										<h4>To Date <span><?=$toDate?></span></h4>
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
											</a>
										</div>
									</div>
							<?php } } ?>
						</aside>
						<!-- Widget Best Sellers /- -->
					</div><!-- /.col-lg-3 -->

				<?php } } ?>
			</div><!-- Row /- -->
		</div>
	</div><!-- /.place-detail -->




<!-- <script>



	 function initMap() {
	 	var latitude = <?=$latitude?>;
	 	var longitude=  <?=$longitude?>;

		//The location of Uluru
		var uluru = {lat: latitude, lng: longitude};
		// The map, centered at Uluru
		var map = new google.maps.Map(
		  document.getElementById('google_map'), {zoom: 16, center: uluru});
		// The marker, positioned at Uluru
		var marker = new google.maps.Marker({position: uluru, map: map});
	}
</script>
 -->




 <!-- Footer Section -->
 <?php
 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->


