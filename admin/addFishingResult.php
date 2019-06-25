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
<?php
include("../dbCon.php");
		$con=connection();
if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
	
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type your name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["description"]) || ($_REQUEST["description"])==''){
			$message="please type your description.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['placeID']) || ($_REQUEST['placeID'] == '')){
			$message .= 'Please Select placeID.<br>';
			$okFlag = FALSE;
		}
		if(!isset($_REQUEST['fishName']) || ($_REQUEST['fishName'] == '')){
			$message .= 'Please Select Fish Name.<br>';
			$okFlag = FALSE;
		}
		if(!isset($_REQUEST['position']) || ($_REQUEST['position'] == '')){
			$message .= 'Please Select placeID.<br>';
			$okFlag = FALSE;
		}

	
	// image upload
			$target_dir = "../img/";
			$newName=date('YmdHis_');
			$newName .=basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir.$newName;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
			
	
	
	
	
	if($okFlag){

		$name=$_REQUEST["name"];
		$fishName=$_REQUEST["fishName"];
		$position=$_REQUEST["position"];
		$description=$_REQUEST["description"];
		$placeID=$_REQUEST["placeID"];
		$size=$_REQUEST["size"];
		$image=$newName;


		$sql="INSERT INTO `fishing_result`(`place_id`, `ownerName`, `fishName`, `position`, `description`, `img`, size) VALUES ($placeID, '$name', '$fishName', $position,'$description','$image', '$size')";

		//echo $sql;
		
		if($con->query($sql)){
			$_SESSION["msg"]="Successfully Posted a post.";
		}else{
			$_SESSION["msg"]="database error.";
		};
		
	}
	
	
}


?>

	<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
		<div class="container">
			<div class="row">
				<div style="color: aliceblue;" class="login-check">
					<div class="checkout-form" >

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


						<form action="" method="post" enctype="multipart/form-data">
							<div class="col-md-12 col-sm-12 col-xs-12 login-form">
								<h3 >Fishing Result</h3>
								<div class="billing-field">

									<div class="col-md-12 form-group">
										<label>Place Event</label>
										<select class="form-control" name="placeID" required >

											<?php
											$sql2 = "SELECT ID, name FROM `fishingplace`";
											$result1 = $con->query( $sql2 );
											if ( $result1->num_rows > 0 ) {
												foreach ( $result1 as $row ) {
													$placeName = $row[ "name" ];
													$placeID = $row[ "ID" ];

													?>

												<option value="<?=$placeID?>">
													<?=$placeName?>
												</option>
											<?php
												}
											//echo("placeName");
											}
											?>
										</select>
									</div>

									<div class="col-md-6 form-group">
										<label>Owner Name</label>
										<input type="text" class="form-control" name="name"  required/>
									</div>

									<div class="col-md-6 form-group">
										<label>Fish Name</label>
										<input type="text" class="form-control" name="fishName" required />
									</div>

									<div class="col-md-6 form-group">
										<label>Position</label>
										<input type="number" min="1" class="form-control" name="position" required />
									</div>

									<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control" name="fileToUpload" required />
									</div>

									<div class="col-md-6 form-group">
										<label>Size</label>
										<input type="text" class="form-control" name="size" required />
									</div>

									<div class="col-md-6 form-group">
										<div class="row">
											<div class="col-md-12">
												<label>Description </label>
											</div>
											<div class="col-md-12">
												<textarea name="description" required style=" height: 100px; width: 100%; color: black;"></textarea>
											</div>
										</div>
									</div>

									
								</div>
								<div>
									<input style="   min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Post" name="submit"/>
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