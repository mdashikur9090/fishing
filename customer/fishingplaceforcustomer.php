 <?php
 include( "../header.php" );
 include( "../dbCon.php" );
 $con = connection();

 ?>


<div class="container">
	<!-- Row -->

	<!-- Tour List Section -->
		<div class="container-fluid no-left-padding no-right-padding tour-list-section">
			<!-- Container -->
			<div class="container">
				<!-- Section Header -->
				<div class="section-header">
					<h3>All Event Places</h3>
				</div><!-- Section Header /- -->
				
				<!-- Row -->
				<div class="row">
					<!-- Tour List -->
					<!-- Row -->
					<?php
					$sql = "SELECT fishingplace.*, (SELECT COUNT(ID) FROM place_rating WHERE place_rating.fishingPlaceID=fishingplace.ID) AS toralRatePerson, (SELECT SUM(star) FROM place_rating WHERE place_rating.fishingPlaceID=fishingplace.ID) AS totalStar, (SELECT COUNT(ID) FROM customer_ticket WHERE customer_ticket.fishingPlaceID=fishingplace.ID) as totalTicket FROM `fishingplace` WHERE `role`=0";
					$result = $con->query( $sql );
					if ( $result->num_rows > 0 ) {

						foreach ( $result as $row ) {
						$placeID = $row[ "ID" ];
						$name = $row[ "name" ];
						$totalTicket = $row["totalTicket"];
						$aviableSeat = $row[ "TotalSeat" ];
						$price = $row[ "price" ];
						$location = $row[ "Location" ];
						$description = $row[ "Description" ];
						$image = $row[ "image" ];
						$fromDate = $row[ "fromDate" ];
						$toDate = $row[ "toDate" ];

						if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
							$star = round($row["totalStar"]/$row["toralRatePerson"]);
						}else{
							$star = 0;
						}

					?>	

						<div class="col-md-4 col-sm-6 col-xs-12 tour-list">
							<div class="tour-content">
								<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
									<a href="place-details.php?placeID=<?=$placeID?>"><img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Tour Place" /></a>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 no-left-padding no-right-padding tour-detail">
									<h3><span class="txt-limit" data-limit-count="30"><?=$name?></span></h3>
									<div class="star-rating text-center">
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
									<div class="tour-time">
										<span></i> From <?=$fromDate?></span>
										<span></i> To <?=$toDate?></span>
									</div>
									<p class="txt-limit" data-limit-count="150" ><?=$description?></p>
									<a href="place-details.php?placeID=<?=$placeID?>" title="more Details">more Details</a>
									<div class="tour-time avilable">
										<span>Total Ticket: <?=$totalTicket?></span>
										<span>Available Ticket: <?=$aviableSeat?></span>
									</div>
									<div class="tour-time avilable">
										<span><?=$location?></span>
										<span><a href="place-details.php?placeID=<?=$placeID?>" class="btn-block"><i class="fa fa-map-marker"></i>Google Map</a></span>
									</div>
									<div class="tour-rate">
										<h5>Ticket Price <span>$<?=$price?></span></h5>
										<a href="BookPlace.php?id=<?=$placeID?>">Book <i class="fa fa-share-square-o"></i></a>
									</div>
								</div>
							</div>
						</div>

					<?php } } ?>
					<!-- Tour List /- -->
				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Tour List Section /- -->

</div>


 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->