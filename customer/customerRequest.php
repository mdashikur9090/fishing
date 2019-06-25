 <?php
 include( "../header.php" );
  ?>
  <?php
if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>
<style>
	.vl{
		border-left: 2px solid #6AC460;
	    height: 300px;
	    float: inherit;
	    overflow: hidden;
	    position: absolute;
	    left: 49%;
	    top: 264px;
	}
</style>

	<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
		<div class="container">
			<div class="row">

				<?php if(isset($_SESSION["confirmMsg"])){ ?>

					<div class="alert alert-success" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Success!</strong> <?=$_SESSION["confirmMsg"]?>
					</div>
					<script>
						window.setTimeout(function() {
						    $(".alert").fadeTo(2000, 0).slideUp(2000, function(){
						        $(this).remove(); 
						    });
						}, 4000);
					</script>
					
				<?php
					unset($_SESSION["confirmMsg"]);
					}
				
				?>

				<div class="checkout-form col-md-6 col-sm-12 col-xs-12" style="color: aliceblue;">
					<form action="customerRequestSubmit.php" method="post">
						<div>
							<h3>Request your Fising Place</h3>
							<div class="billing-field">


								<div class="col-md-12 form-group">
									<label>Place Name</label>
									<input type="text" class="form-control" name="name" required/>
								</div>


								<div class="col-md-12 form-group" style=" ">
									<label>Location</label>
									<input type="text" class="form-control" name="location" required/>
								</div>
								
								<div class="col-md-12 form-group" style=" ">
									<label>Description</label>
									<textarea maxlength="200" name="comment" required class="form-control"></textarea>
								</div>

							</div>
							<div>
								<input style="min-width: 100px; margin-left: 30%;" class="btn btn-success" type="submit" value="Request Fising Place" name="placesubmit"/>
							</div>

						</div>
					</form>
				</div>


				<div class="checkout-form col-md-6 col-sm-12 col-xs-12" style="color: aliceblue;">
					<form action="customerRequestSubmit.php" method="post">
						<div class="">
							<h3>Request your Fising Kits and tool</h3>
							<div class="billing-field">
								<div class="col-md-12 form-group">
									<label>Kits or toll Name</label>
									<input type="text" class="form-control" name="name" required/>
								</div>
								<div class="col-md-12 form-group" style=" ">
									<label>Brand</label>
									<input type="text" class="form-control" name="brand" required/>
								</div>
								<div class="col-md-12 form-group" style=" ">
									<label>Description</label>
									<textarea maxlength="200" name="comment" required class="form-control"></textarea>
								</div>
							</div>
							<div>
								<input style="min-width: 100px; margin-left: 35%;" class="btn btn-success" type="submit" value="Request Fising Kit or tool" name="kit_submit"/>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>






 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->