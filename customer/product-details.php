 <?php
 include( "../header.php" );
 include( "../dbCon.php" );
 $con = connection();

 ?>
	<div class="place-detail product">
		<div class="container">
			<!-- Section Header -->
			<div class="section-header">
				<h3>Product Details</h3>
			</div><!-- Section Header /- -->
			
			<!-- Row -->
			<div class="row">
				<?php

					$productID = $_GET["productID"];

					$sql = "SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=$productID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=$productID) AS totalStar FROM `product` WHERE product.ID=$productID";
					$result = $con->query( $sql );
					if ( $result->num_rows > 0 ) {
						foreach ( $result as $row ) {
						$productID = $row[ "ID" ];
						$catagory_id = $row[ "catagory_id" ];
						$name = $row[ "name" ];
						$description = $row[ "Description" ];
						$buyPrice = $row[ "buyPrice" ];
						$hirePrice = $row[ "hirePrice" ];
						$image = $row[ "img" ];

						if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
							$star = round($row["totalStar"]/$row["toralRatePerson"]);
						}else{
							$star = 0;
						}


						

					?>	

					<div class="col-lg-9">
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

						<article class="the_post">
							<figure>
								<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Thumb">
							</figure>
							<h2 class="the_title"><?=$name?></h2>
							<div class="col-xs-12 tour-detail">
								<div class="star-rating text-center">
									<a href="product-ratting.php?productId=<?=$productID?>&star=1"> 
										<?php if($star>=1){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="product-ratting.php?productId=<?=$productID?>&star=2">
										<?php if($star>=2){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="product-ratting.php?productId=<?=$productID?>&star=3">
										<?php if($star>=3){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="product-ratting.php?productId=<?=$productID?>&star=4">
										<?php if($star>=4){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
									<a href="product-ratting.php?productId=<?=$productID?>&star=5">
										<?php if($star>=5){?><i class="fa fa-star"></i>
										<?php }else{ ?> <i class="fa fa-star muted"></i> 
										<?php } ?> 
									</a>
								</div>
								<br />
								<div class="tour-time">
									<span>Buy Price: $<?=$buyPrice?></span>
									<span>
										<a href="addcardCheck.php?id=<?=$productID?>&productDet=yes" class="btn-sm btn-primary">Add to Buy Cart <i class="fa fa-shopping-cart"></i></a>
									</span>
								</div>
								<div class="tour-time">
									<span>Hire Price: $<?=$hirePrice?></span>
									<span>
										<a href="addcardCheck.php?hireid=<?=$productID?>&productDet=yes" class="btn-sm btn-warning">Add to Hire Cart <i class="fa fa-shopping-cart"></i></a>
									</span>
								</div>
							</div><!-- /.col-xs-12 -->
							<p><?=$description?></p>
							<div class="post_footer">
								<div id="google_map"></div><!-- /#google_map -->
							</div><!-- /.post_footer -->
						</article>
					</div><!-- /.col-lg-9 -->
					<div class="col-lg-3">
						<!-- Widget Popular Products -->
						<aside class="widget widget_popular_products">
							<h3 class="widget-title">You may also like</h3>

							<?php
								$sql = "SELECT * FROM `product` WHERE catagory_id=".$catagory_id." limit 5";
								$result = $con->query( $sql );
								if ( $result->num_rows > 0 ) {
									foreach ( $result as $row ) {
									$productID = $row[ "ID" ];
									$name = $row[ "name" ];
									$buyPrice = $row[ "buyPrice" ];
									$hirePrice = $row[ "hirePrice" ];
									$image = $row[ "img" ];

								?>
										<!-- Popular Product Box -->
										<div class="pp-box">
											<div class="product-img"><a href="product-details.php?productID=<?=$productID?>" title="Product"><img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="img" /></a>
											</div>
											<h4><?=$name?> <span> Buy Price $<?=$buyPrice?></span></h4>
											<h4><span> Hire Price $<?=$hirePrice?></span></h4>
											<div class="star-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star muted"></i>
											</div>
										</div>
										<!-- Popular Product Box /- -->
									<?php }
								} ?>

						</aside>
						<!-- Widget Best Sellers /- -->
					</div><!-- /.col-lg-3 -->

				<?php } } ?>
			</div><!-- Row /- -->
		</div>
	</div><!-- /.place-detail -->


 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->