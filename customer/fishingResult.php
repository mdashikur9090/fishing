<?php
	include( "../header.php" );
	include( "../dbCon.php" );
	$con = connection();
	
?>	


<div class="container" style="margin-top: 170px">
	<!-- Row -->
	<div class="row shop">
		<!-- Section Header -->
	<div class="section-header">
		<h3>Fishing Result</h3>
	</div><!-- Section Header /- -->
		<div class="col-md-12 col-sm-12 col-xs-12">

			<ul class="products">

				<?php
					$sql = "SELECT fishing_result.id, fishing_result.description,  fishing_result.ownerName, fishing_result.fishName, fishing_result.position, fishingplace.id, fishingplace.name, fishingplace.image, size FROM `fishing_result` INNER JOIN fishingplace ON(fishing_result.place_id=fishingplace.ID)";

					//echo $sql;
					$result = $con->query( $sql );
					if ( $result->num_rows > 0 ) {

						foreach ( $result as $row ) {
						$id = $row[ "id" ];
						$ownerName = $row[ "ownerName" ];
						$fishName = $row[ "fishName" ];
						$position = $row[ "position" ];
						$Description = $row[ "description" ];
						$place_id = $row[ "id" ];
						$image = $row[ "image" ];
						$size = $row[ "size" ];
						
				
				?>
 
						<!-- Product -->
						<li class="product">
							<a href="#">
								<img src="<?=$_SESSION["directory"]?>img/<?=$image?>" alt="image"  style="max-height: 150px; max-width: 200px; left: 20%;" />
								<h3><?=$ownerName?></h3>
								<span class="">Fish Size: <?=$size?></span>
								<h3><?=$fishName?></h3>
								<span class="">Position: <?=$position?></span>
								<p><?=$Description?></p>
							</a>
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