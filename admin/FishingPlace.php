	

	<?php include("../header.php"); ?>
	<?php
		if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==0)){
	?>
			<script>
				location.href="<?=$_SESSION["directory"]?>index.php";
			</script>

	<?php 
		}
	?>	

	
	<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div style="color: aliceblue;">
				<div class="checkout-form">


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

					<form action="FishingPlaceChecker.php" method="post"  enctype="multipart/form-data">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h3 >Fising Place</h3>
							<div class="billing-field">
								<div class="col-md-6 form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" required/>
								</div>
								<div class="col-md-6 form-group" style=" ">
									<label>Image</label>
									<input type="file" class="form-control" name="fileToUpload" required />
								</div>
								<div class="col-md-12 form-group">
									<div class="row">
										<div class="col-md-12">
											<label>Description </label>
										</div>
										<div class="col-md-12">
											<textarea name="description" required style=" height: 100px; width: 100%; color: black;"></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6 form-group">
									<label>Total seat</label>
									<input type="number" class="form-control" name="seat" required />
								</div>
								<div class="col-md-6 form-group">
									<label>Price</label>
									<input type="number" class="form-control" name="Price" required/>
								</div>
								<div class="col-md-6 form-group">
									<label>Location</label>
									<input type="text" class="form-control" name="location" required "/>
								</div>
								<div class="col-md-6 form-group">
									<label>Latitude</label>
									<input type="text" class="form-control" name="latitude" required "/>
								</div><div class="col-md-6 form-group">
									<label>Longitude</label>
									<input type="text" class="form-control" name="longitude" required "/>
								</div>
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<input type="date" class="form-control" id="fromDate" name="fromDate" required />
								</div><div class="col-md-6 form-group">
									<label>To Date</label>
									<input type="date" class="form-control" id="toDate" name="toDate" required />
								</div>
								
							</div>
							<div>
								<input style=" min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Save" name="submit"/>
							</div>
						</div>			
					</form>
				</div>
			</div>
		</div>
	</div>
</div>		
							
										
														

	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>
	<!-- Footer Section /- -->
 


	<script>

		var formattedDate = new Date();
		var d = formattedDate.getDate();
		var m =  formattedDate.getMonth();
		m += 1;  // JavaScript months are 0-11
		var y = formattedDate.getFullYear();

		var mindate = y + "-0" + m + "-0" + d;


		$( "#fromDate" ).prop('min', mindate);
		$( "#toDate" ).prop('min', mindate);


		// $("#fromDate").on('change',function(){
		// 	//$( "#toDate" ).prop('min', mindate);
		// 	//console.log($( "#toDate" ).val());
		// }



	</script>

	<input type=text id=input_id />
<script>
setInterval(function() { ObserveInputValue($('#fromDate').val()); }, 100);

function ObserveInputValue(){

	if($('#fromDate').val() != ''){

		var formattedDate = new Date($('#fromDate').val());
		var d = formattedDate.getDate();
		d += 1;
		var m =  formattedDate.getMonth();
		m += 1;  // JavaScript months are 0-11
		var y = formattedDate.getFullYear();

		var mindate = y;

		if (m > 9) {
			mindate += "-" + m;
		}else{
			mindate += "-0" + m;
		}

		if (d > 9) {
			mindate += "-" + d;
		}else{
			mindate += "-0" + d;
		}


		$( "#toDate" ).prop('min', mindate);
   	}
	
}
</script>