<?php
	include( "../header.php" );
	include( "../dbCon.php" );
	$con = connection();

if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
?>

<script>
	location.href="<?=$_SESSION["directory"]?>login.php";
</script>

<?php
	}else if( isset($_SESSION["isLogedIn"]) && $_SESSION["role"]==0 ){
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
		<!-- Section Header -->
	<div class="section-header">
		<h3>Fishing Result</h3>
	</div><!-- Section Header /- -->

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
					$sql = "SELECT fishing_result.id, fishing_result.description, fishing_result.ownerName, fishing_result.fishName, fishing_result.position, fishingplace.id as place_id, fishingplace.name, fishingplace.image, size FROM `fishing_result` INNER JOIN fishingplace ON(fishing_result.place_id=fishingplace.ID)";

					//echo $sql;
					$result = $con->query( $sql );
					if ( $result->num_rows > 0 ) {

						foreach ( $result as $row ) {
						$id = $row[ "id" ];
						$place_id = $row[ "place_id" ];
						$ownerName = $row[ "name" ];
						$fishName = $row[ "fishName" ];
						$position = $row[ "position" ];
						$Description = $row[ "description" ];
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
							<div>
								<a  style="margin-top: -80px;" onclick="delete_place_result(<?=$id?>)" class="addto-cart" title="Delete Result">Delete</a>
							</div>
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
function delete_place_result(id){
	var chk=confirm("do you want to delete");
	
	if(chk==true){
		location.href="delete_fishing_result.php?id="+id;
	}
		
}

</script>