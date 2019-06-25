
<?php 
	include("../Header.php");
	include("../dbCon.php");
	$con=connection();
	//echo($_SESSION["isLogedIn"]);

?>



<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 20%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>



<div class="container" style="margin-top: 170px">
	<!-- Row -->
	<div class="row shop"> 
		<div class="col-md-8 col-sm-7 col-xs-12 content-area">
			<!-- Section Header -->
			<div class="section-header">
				<h3>Fishing Kids And Tools</h3>
			</div><!-- Section Header /- -->

			<?php if(isset($_SESSION["cartMsg"])){ ?>
				<div class="alert alert-success" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Success!</strong> <?=$_SESSION["cartMsg"]?>
				</div>
				<script>
					window.setTimeout(function() {
					    $(".alert").fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 4000);
				</script>
				
			<?php
				unset($_SESSION["cartMsg"]);
				}
			
			?>


			<ul class="products">
			
				<?php

					if (isset($_GET["searchByCatName"])) {
						$sql="SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=product.ID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=product.ID) AS totalStar FROM `product` INNER JOIN catagory ON (product.catagory_id=catagory.ID) WHERE catagory.name='".$_GET["searchByCatName"]."'";
					}elseif(isset($_GET["searchByName"])){
						$sql="SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=product.ID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=product.ID) AS totalStar FROM `product` WHERE `name` LIKE '%".$_GET["searchByName"]."%'";
					}elseif(isset($_GET["searchByPrice"])){
						$sql="SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=product.ID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=product.ID) AS totalStar FROM `product`WHERE `buyPrice` < ".$_GET["searchByPrice"];
					}
					else{
						$sql="SELECT product.*, (SELECT COUNT(ID) FROM product_rating WHERE product_rating.productID=product.ID) AS toralRatePerson, (SELECT SUM(star) FROM product_rating WHERE product_rating.productID=product.ID) AS totalStar FROM product";	
					}
									
					$result=$con->query($sql);
					if($result->num_rows>0){
						
						foreach($result as $row){ 
							$name=$row["name"];
							$description=$row["Description"];
							$image=$row["img"];
							$buyprice=$row["buyPrice"];
							$hireprice=$row["hirePrice"];
							$productID=$row["ID"];

							if ($row["totalStar"]!=0 && $row["toralRatePerson"]) {
								$star = round($row["totalStar"]/$row["toralRatePerson"]);
							}else{
								$star = 0;
							}
				?>	

							<!-- Product -->
							<li class="product" style="border: 1px solid #ececec; padding: 10px;">
								<a href="product-details.php?productID=<?=$productID?>">
									<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="Product" />
									<h3 class="txt-limit" data-limit-count="25"><?=$name?></h3>
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
									<span class="price">Hire price: <?=$hireprice?></span>
								</a>
								<div>
									<a  style="margin-top: -80px;" href="addcardCheck.php?hireid=<?=$productID?>" class="addto-cart" title="Hire product">Add To Hire</a>
								</div>
								<a href="addcardCheck.php?id=<?=$productID?>" class="addto-cart" title="Add To Cart">Add To Buy</a>
							</li><!-- Product /- -->


				<?php
						}	
					}

				?>


			</ul>
		</div>

		<!-- Widget Categories -->
		<div class="col-md-4 col-sm-5 col-xs-12 widget-area">

			<aside class="widget widget_categories">
				<h3 class="widget-title">Serach By Name: </h3>
				<form action="" method="GET">
					<input type="text" name="searchByName">
					<input type="submit" value="Search" id="search-bar" class="btn-sm btn-primary">
				</form>
				</br>
				<h3 class="widget-title">Price Range: </h3>
				<div class="slidecontainer">
				  <input type="range" min="10" max="10000" value="0"  class="slider" id="myRange">
				  <p>Price: <span id="demo"></span></p>
				  <input class="btn btn-primary" type="button" value="Check" name="checkbtn" onClick="checkprice()">
				</div>
			</aside>

			<aside class="widget widget_categories">
				<h3 class="widget-title">CATEGORIES</h3>
				<ul>
				<?php
					$sql2="SELECT * FROM `catagory`";
					$result1=$con->query($sql2);
					if($result1->num_rows>0){
						foreach($result1 as $row){
							$Cat_name=$row["name"];
							$Cat_ID=$row["ID"];
							
				?>
							<li>
								<a href="<?=$_SESSION["directory"]?>customer/product.php?searchByCatName=<?=$Cat_name?>" ><?=$Cat_name?> </a>
							</li>
			 	<?php	
							}
						//echo("Cat_name");
						}
				?>
				</ul>
			</aside><!-- Widget Categories /- -->
		</div>
	</div>
</div>



 
<?php

include("../footer.php");
?>
	
		
<script>

	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;

	slider.oninput = function() {
	  output.innerHTML = this.value;
	}

	function checkprice(){
		
		var price=parseInt(document.getElementById("demo").innerHTML);
		location.href="<?=$_SESSION["directory"]?>customer/product.php?searchByPrice="+price;
	}
</script>	 
		
	