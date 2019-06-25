<?php
include("header.php");
if(!isset($_SESSION["isLogedIn"])){
	$_SESSION["isLogedIn"]=false;
}
	include("DbCon.php");
	$con=connection();
?>




<main>

	<?php 
		if(isset($_SESSION["role"]) && ($_SESSION["role"]==1)){
	?>
		<div class="container">
			<div style="margin-top: 180px">
			</div>

			

			<?php 

				//buy product			
				$buyproductSQL="SELECT product.ID, SUM(buyproduct.quantity) AS totalQty, product.name FROM `buyproduct` INNER JOIN product ON (buyproduct.ProductID=product.ID) GROUP BY ProductID";
				$buyProduct = [];
				$buyProductResult=$con->query($buyproductSQL);
				if($buyProductResult->num_rows>0){
					foreach($buyProductResult as $row){

						//$buyProduct[] = array("x"=> $row["name"], "y"=> $row["totalQty"]); 
						$buyProduct[] = array("y" => $row["totalQty"], "label" => $row["name"] ); 

					}
				}

				//hire product			
				$hireProductSQL="SELECT product.ID, SUM(hireproduct.qty) AS totalQty, product.name FROM `hireproduct` INNER JOIN product ON (hireproduct.ProductID=product.ID) GROUP BY ProductID";
				$hireProduct = [];
				$hireProductResult=$con->query($hireProductSQL);
				if($hireProductResult->num_rows>0){
					foreach($hireProductResult as $row){

						//$hireProduct[] = array("x"=> $row["name"], "y"=> $row["totalQty"]); 
						$hireProduct[] = array("y" => $row["totalQty"], "label" => $row["name"] ); 

					}
				}

				//place 			
				$placeSQL="SELECT customer_ticket.ID, SUM(customer_ticket.ID) AS totalQty, fishingplace.name FROM customer_ticket INNER JOIN fishingplace ON (customer_ticket.fishingPlaceID=fishingplace.ID) WHERE customer_ticket.role=1 GROUP BY customer_ticket.fishingPlaceID";
				$place = [];
				$placeResult=$con->query($placeSQL);
				if($placeResult->num_rows>0){
					foreach($placeResult as $row){

						//$place[] = array("x"=> $row["name"], "y"=> $row["totalQty"]); 
						$place[] = array("y" => $row["totalQty"], "label" => $row["name"] ); 

					}
				}

				?>

			
				<div id="buy_product" style="height: 400px; width: 100%;"></div>
				<br>
				<div id="hire_product" style="height: 400px; width: 100%;"></div>
				<br>
				<div id="place_order" style="height: 400px; width: 100%;"></div>
		</div>

			

			

	<?php 
		}else{
	?>
			<!-- Slider Section -->
			<div class="container-fluid no-padding slider-section">
				<!-- START REVOLUTION SLIDER 5.0 -->
				<div class="rev_slider_wrapper">
					<div id="home-slider2" class="rev_slider" data-version="5.0">
						<ul>
							<li data-transition="fade" data-slotamount="default"  data-easein="easeInOut" data-easeout="easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7">
								<!-- MAIN IMAGE -->
								<img src="images/slide2.jpg"  alt="Slide"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" class="rev-slidebg" data-no-retina>
								
								<!-- LAYER NR. 1 -->
								<div class="tp-caption tp-shape tp-shapewrapper" id="slide-1-layer-1"
									data-x="['center','center','center','center']"
									data-y="['middle','middle','middle','middle']" 
									data-basealign="slide" 
									data-height="full" 
									data-hoffset="['0','0','0','0']" 
									data-responsive="off" 
									data-responsive_offset="off" 
									data-start="0" 
									data-transform_idle="o:1;" 
									data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;" 
									data-transform_out="opacity:0;s:500;s:500;" 
									data-voffset="['0','0','0','0']" 
									data-whitespace="nowrap" 
									data-width="full"
									style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);">
								</div>
								
								<!-- LAYER NR. 2 -->
								<div class="tp-caption Agency-SmallTitle tp-resizeme rs-parallaxlevel-3" id="slide-1-layer-2" 
									data-x="['right','right','right','right']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['310','235','170','90']" 
									data-fontsize="['45','45','35','20']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['58','58','58','58']"
									data-width="none"
									data-height="none"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on"
									style="z-index: 8; letter-spacing: 1.8px; font-family: 'Libre Baskerville', serif;">Get Ready <span style="color:#4aa933;">To Fishing</span>
								</div>
								
								<!-- LAYER NR. 3 -->
								<div class="tp-caption Agency-SmallContent   tp-resizeme rs-parallaxlevel-3" id="slide-1-layer-3" 
									data-x="['right','right','right','right']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['370','282','220','120']" 
									data-fontsize="['45','45','35','20']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['58','58','58','58']"
									data-width="none"
									data-height="none"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on"
									style="z-index: 8; letter-spacing: 1.8px; font-family: 'Libre Baskerville', serif;">Enjoy <span style="color:#4aa933;">Fishing Tour</span>
								</div>
								
								<!-- LAYER NR. 4 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-3" id="slide-1-layer-4" 
									data-x="['right','right','right','right']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['460','350','284','170']" 
									data-fontsize="['14','14','14','12']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['26','26','26','26']"
									data-width="['667','655','655','390']"
									data-height="none"
									data-whitespace="normal"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2150" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on" 
									style="z-index: 9; text-align: right; letter-spacing: 0.56px; font-family: 'Libre Baskerville', serif; letter-spacing: 0.64px; color: #fff;">Gather your gear and meet your charter captain at the dock. Prepare yourself for a fun filled day of fishing and friends!
								</div>
								
								<!-- LAYER NR. 5 -->
								<div class="tp-caption NotGeneric-Button rev-btn  rs-parallaxlevel-0" id="slide-1-layer-5" 
									data-x="['right','right','right','right']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['582','443','378','290']" 
									data-fontsize="['14','14','14','14']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['26','26','26','26']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-style_hover="c:#fff;bg:#333;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-actions='[{"event":"click","action":"scrollbelow","offset":"0px"}]'
									data-responsive_offset="on" 
									data-responsive="off"
									style="z-index: 9; border: none; padding: 10px 34px; letter-spacing: 0.56px; background-color: #4aa933; white-space:nowrap; outline:none; box-shadow:none; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box;">Let's Fishing
								</div>								
							</li>
							
							<li data-transition="fade" data-slotamount="default"  data-easein="easeInOut" data-easeout="easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7">
								<!-- MAIN IMAGE -->
								<img src="images/slide3.jpg"  alt="Slide"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
								
								<!-- LAYER NR. 1 -->
								<div class="tp-caption tp-shape tp-shapewrapper" id="slide-2-layer-1"
									data-x="['center','center','center','center']"
									data-y="['middle','middle','middle','middle']" 
									data-basealign="slide" 
									data-height="full" 
									data-hoffset="['0','0','0','0']" 
									data-responsive="off" 
									data-responsive_offset="off" 
									data-start="0" 
									data-transform_idle="o:1;" 
									data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;" 
									data-transform_out="opacity:0;s:500;s:500;" 
									data-voffset="['0','0','0','0']" 
									data-whitespace="nowrap" 
									data-width="full"
									style="z-index: 5;background-color:rgba(0, 0, 0, 0.45);">
								</div>
								
								<!-- LAYER NR. 2 -->
								<div class="tp-caption Agency-SmallTitle tp-resizeme rs-parallaxlevel-3" id="slide-2-layer-2" 
									data-x="['left','left','left','left']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['310','235','170','90']" 
									data-fontsize="['45','45','35','20']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['58','58','58','58']"
									data-width="none"
									data-height="none"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on"
									style="z-index: 8; letter-spacing: 1.8px; font-family: 'Libre Baskerville', serif;">All adventures start with the first step
								</div>
								
								<!-- LAYER NR. 3 -->
								<div class="tp-caption Agency-SmallContent   tp-resizeme rs-parallaxlevel-3" id="slide-2-layer-3" 
									data-x="['left','left','left','left']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['370','282','220','120']" 
									data-fontsize="['45','45','35','20']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['58','58','58','58']"
									data-width="none"
									data-height="none"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on"
									style="z-index: 8; letter-spacing: 1.8px; font-family: 'Libre Baskerville', serif;">Book Online
								
								<!-- LAYER NR. 4 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-3" id="slide-2-layer-4" 
									data-x="['left','left','left','left']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['460','350','284','170']" 
									data-fontsize="['14','14','14','12']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['26','26','26','26']"
									data-width="['667','655','655','390']"
									data-height="none"
									data-whitespace="normal"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2150" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on" 
									style="z-index: 9; text-align: left; letter-spacing: 0.56px; font-family: 'Libre Baskerville', serif; letter-spacing: 0.64px; color: #fff;">Book your next charter fishing trip safely on our secure server after reading user reviews and ratings.
								</div>
								
								<!-- LAYER NR. 5 -->
								<div class="tp-caption NotGeneric-Button rev-btn  rs-parallaxlevel-0" id="slide-2-layer-5" 
									data-x="['left','left','left','left']" data-hoffset="['375','35','15','15']" 
									data-y="['top','top','top','top']" data-voffset="['582','443','378','290']" 
									data-fontsize="['14','14','14','14']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['26','26','26','26']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-style_hover="c:#fff;bg:#0099ee;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-actions='[{"event":"click","action":"scrollbelow","offset":"0px"}]'
									data-responsive_offset="on" 
									data-responsive="off"
									style="z-index: 9; border: 1px solid #0099ee; padding: 10px 34px; letter-spacing: 0.56px; color: #0099ee; white-space: nowrap; outline:none; box-shadow:none; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box;">Let's Fishing
								</div>								
							</li>
							
							<li data-transition="fade" data-slotamount="default"  data-easein="easeInOut" data-easeout="easeInOut" data-masterspeed="2000" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7">
								<!-- MAIN IMAGE -->
								<img src="images/slide4.jpg"  alt="Slide"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
								
								<!-- LAYER NR. 1 -->
								<div class="tp-caption tp-shape tp-shapewrapper" id="slide-3-layer-1"
									data-x="['center','center','center','center']"
									data-y="['middle','middle','middle','middle']" 
									data-basealign="slide" 
									data-height="full" 
									data-hoffset="['0','0','0','0']" 
									data-responsive="off" 
									data-responsive_offset="off" 
									data-start="0" 
									data-transform_idle="o:1;" 
									data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;" 
									data-transform_out="opacity:0;s:500;s:500;" 
									data-voffset="['0','0','0','0']" 
									data-whitespace="nowrap" 
									data-width="full"
									style="z-index: 5;background-color:rgba(0, 0, 0, 0.45);">
								</div>
								
								<!-- LAYER NR. 2 -->
								<div class="tp-caption Agency-SmallTitle tp-resizeme rs-parallaxlevel-3" id="slide-3-layer-2" 
									data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
									data-y="['top','top','top','top']" data-voffset="['330','235','170','90']" 
									data-fontsize="['45','45','35','20']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['58','58','58','58']"
									data-width="none"
									data-height="none"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on"
									style="z-index: 8; letter-spacing: 1.8px; font-family: 'Libre Baskerville', serif;">Explore Destinations
								</div>
								
								<!-- LAYER NR. 4 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-3" id="slide-3-layer-4" 
									data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
									data-y="['top','top','top','top']" data-voffset="['410','310','234','150']" 
									data-fontsize="['14','14','14','12']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['26','26','26','26']"
									data-width="['640','655','655','390']"
									data-height="none"
									data-whitespace="normal"
									data-transform_idle="o:1;"
									data-transform_in="y:-50px;opacity:0;s:1000;e:Power4.easeOut;" 
									data-transform_out="opacity:0;s:3000;e:Power4.easeIn;s:3000;e:Power4.easeIn;" 
									data-start="2150" 
									data-splitin="none" 
									data-splitout="none" 
									data-responsive_offset="on" 
									style="z-index: 9; text-align: center; letter-spacing: 0.56px; font-family: 'Libre Baskerville', serif; letter-spacing: 0.64px; color: #fff;">The FISHING has some of the best fishing Place. Search for your next charter fishing destination today.
								</div>
								
								<!-- LAYER NR. 5 -->
								<div class="tp-caption NotGeneric-Button rev-btn  rs-parallaxlevel-0" id="slide-3-layer-5" 
									data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
									data-y="['top','top','top','top']" data-voffset="['520','413','338','280']" 
									data-fontsize="['14','14','14','14']"
									data-fontweight="['700','700','700','700']"
									data-lineheight="['26','26','26','26']"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-style_hover="c:#fff;bg:#0099ee;"
									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
									data-start="2000" 
									data-splitin="none" 
									data-splitout="none" 
									data-actions='[{"event":"click","action":"scrollbelow","offset":"0px"}]'
									data-responsive_offset="on" 
									data-responsive="off"
									style="z-index: 9; border: 1px solid #0099ee; padding: 10px 34px; letter-spacing: 0.56px; color: #0099ee; white-space: nowrap; outline:none; box-shadow: none; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box;">Let's FISHING
								</div>								
							</li>
						</ul> 
					</div>
				</div>
			</div><!-- Slider Section /- -->


			<!-- new product  Section -->
			<div class="container-fluid no-left-padding no-right-padding photographs-section">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Latest Product</h3>
					</div><!-- Section Header /- -->
					<!-- Row -->
					<div class="row">
						<div class="photographs-carousel">

							<?php 
						
								$sql1="SELECT * FROM `product` ORDER BY `product`.`ID` DESC LIMIT 6";
								$result1=$con->query($sql1);
								if($result1->num_rows>0){

									//$size=	$result->num_rows;			
								//for($x=0;$x<$size;$x++){
								foreach($result1 as $row){ 
									$name=$row["name"];
									$image=$row["img"];
									$buyprice=$row["buyPrice"];
									$hireprice=$row["hirePrice"];
									$productID=$row["ID"];
							
							?>
									<div>
										<div class="tour-rate">
											<h5><span class="txt-limit" data-limit-count="18" ><?=$name?></span></h5>
										</div>
										<div class="tour-rate">
											<a href="customer/product-details.php?productID=<?=$productID?>"><img src="img/<?=$image?>" alt="thum" /></a>
										</div>
										<div class="tour-rate">
											<h5 class="text-center"><span>But Price: $<?=$buyprice?></span></h5>
										</div>
										<div class="tour-rate">
											<h5 class="text-center"><span>Hire Price: $<?=$hireprice?></span></h5>
										</div>
									</div>

							<?php 
								}
							}
							?>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- new product Section /- -->
			
			
			<!-- Tour List Section -->
			<div class="container-fluid no-left-padding no-right-padding tour-list-section">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>On Going Event Places</h3>
					</div><!-- Section Header /- -->
					
					<!-- Row -->
					<div class="row">
						<!-- Tour List -->
						<!-- Row -->
						<?php
						
						$sql="SELECT * FROM `fishingplace` LIMIT 6";
						$result=$con->query($sql);
						if($result->num_rows >0){
							foreach($result as $row){
								$placeID = $row[ "ID" ];
								$name = $row[ "name" ];
								$TotalSeat = $row[ "TotalSeat" ];
								$price = $row[ "price" ];
								$location = $row[ "Location" ];
								$description = $row[ "Description" ];
								$image = $row[ "image" ];
								$fromDate = $row[ "fromDate" ];
								$toDate = $row[ "toDate" ];
							
						?>
							
								<div class="col-md-4 col-sm-6 col-xs-12 tour-list">
									<div class="tour-content">
										<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
											<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Tour Place" />
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12 no-left-padding no-right-padding tour-detail">
											<h3><span class="txt-limit" data-limit-count="30"><?=$name?></span></h3>
											<div class="star-rating text-center">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star muted"></i>
											</div>
											<div class="tour-time">
												<span></i> From <?=$fromDate?></span>
												<span></i> To <?=$toDate?></span>
											</div>
											<p class="txt-limit" data-limit-count="150" ><?=$description?></p>
											<a href="customer/place-details.php?placeID=<?=$placeID?>" title="more Details">more Details</a>
											<div class="tour-time avilable">
												<span>Total Ticket: 20</span>
												<span>Available Ticket: 10</span>
											</div>
											<div class="tour-time avilable">
												<span><?=$location?></span>
												<span><a href="customer/place-details.php?placeID=<?=$placeID?>" class="btn-block"><i class="fa fa-map-marker"></i>Google Map</a></span>
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
					<span><a href="customer/fishingplaceforcustomer.php" title="Show More">Show More</a></span>
				</div><!-- Container /- -->
			</div><!-- Tour List Section /- -->
			

			
			<!-- Contact Section -->
			<div class="container-fluid no-left-padding no-right-padding contact-section">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<!-- Contact Box -->
						<div class="col-md-4 col-sm-4 col-xs-6 contact-box">
							<div class="contact-detail">
								<i class="icon icon-Phone2"></i>
								<h4>Call Us :</h4>
								<p><a href="tel:+111234567890" title="+(11) 123 456 7890">+(880) 123456789</a></p>
							</div>
						</div><!-- Contact Box /- -->
						<!-- Contact Box -->
						<div class="col-md-4 col-sm-4 col-xs-6 contact-box">
							<div class="contact-detail">
								<i class="icon icon-Pointer"></i>
								<h4>Address :</h4>
								<p>123,Kaoran Bazar, Dhaka</p>
							</div>
						</div><!-- Contact Box /- -->
						<!-- Contact Box -->
						<div class="col-md-4 col-sm-4 col-xs-6 contact-box">
							<div class="contact-detail">
								<i class="icon icon-Mail"></i>
								<h4>Email Us :</h4>
								<p><a href="mailto:info@maxguider.com" title="info@maxguider.com">info@fishing.com</a></p>
							</div>
						</div><!-- Contact Box /- -->
					</div>
				</div><!-- Container /- -->
				
			</div><!-- Contact Section /- -->

	<?php 
		}
	?>

		
		
	</main>


<script>
	window.onload = function () {

		var chart = new CanvasJS.Chart("buy_product", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Buy Product Sell Report"
			},
			axisY: {
				title: "Total count of each product sell"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## pieces",
				dataPoints: <?php echo json_encode($buyProduct, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();

		var chart = new CanvasJS.Chart("hire_product", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Hire Product Sell Report"
			},
			axisY: {
				title: "Total count of each product sell"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## pieces",
				dataPoints: <?php echo json_encode($hireProduct, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();


		var chart = new CanvasJS.Chart("place_order", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Place Ticket Sell Report"
			},
			axisY: {
				title: "Total count of each place sell"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## pieces",
				dataPoints: <?php echo json_encode($place, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	 
	}
</script>

	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	
		
<!-- Footer Section -->
<?php include("footer.php"); ?>
<!-- Footer Section /- -->
			


