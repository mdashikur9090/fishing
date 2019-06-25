
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

if(isset($_POST["submit"])){
		include("../dbCon.php");
		$con=connection();
		
		$okFlag=TRUE;
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type  name.";
			$okFlag=FALSE;
		}if(!isset($_REQUEST["description"]) || $_REQUEST["description"]==''){
			$message="please type  description.";
			$okFlag=FALSE;
		}if(!isset($_REQUEST["seat"]) || $_REQUEST["seat"]==''){
			$message="please type  seat.";
			$okFlag=FALSE;
		}if(!isset($_REQUEST["Price"]) || $_REQUEST["Price"]==''){
			$message="please type  Price.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["location"]) || $_REQUEST["location"]==''){
				$message="please type  location.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["latitude"]) || $_REQUEST["latitude"]==''){
				$message="please type  latitude.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["longitude"]) || $_REQUEST["longitude"]==''){
				$message="please type  longitude.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["fromDate"]) || $_REQUEST["fromDate"]==''){
				$message="please type  From Date.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["toDate"]) || $_REQUEST["toDate"]==''){
				$message="please type  To Date.";
				$okFlag=FALSE;
		}
	
	
	if($okFlag){ 
		
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
				echo "File is an image - " . $check["mime"] . ".";
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
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
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
	
		$name=$_REQUEST["name"];
		$description=$_REQUEST["description"];
		$image=$newName;
		$seat=$_REQUEST["seat"];
		$price=$_REQUEST["Price"];
		$location=$_REQUEST["location"];
		$latitude=$_REQUEST["latitude"];
		$longitude=$_REQUEST["longitude"];
		$fromDate=$_REQUEST["fromDate"];
		$toDate=$_REQUEST["toDate"];
		 
	 
		$sql2="SELECT MAX(ID) AS ID FROM `fishingplace`";
		
		$result=$con->query($sql2);
			
		if($result->num_rows > 0){
			foreach($result as $row){
				$new_id=($row['ID']);
			}
		}

		$new_id+=1;
		 $sql="INSERT INTO `fishingplace`(`ID`, `name`, `Description`, `TotalSeat`, `price`, `location`, `latitude`, `longitude`, `image`, `fromDate`, `toDate`) VALUES ($new_id,'$name' ,'$description', $seat, $price,'$location', $latitude, $longitude, '$image', '$fromDate', '$toDate')";
		
			echo($sql);
		if($con->query($sql)){
			$_SESSION["msg"]="Successfully added information.";
			 
			for($a=0;$a<$seat;$a++){
				$sql1="INSERT INTO `customer_ticket`(`fishingPlaceID`) VALUES ($new_id)";
				$con->query($sql1);
			}
		}else{
			$_SESSION["msg"]="database error.";
		};
			
		echo($_SESSION["msg"]);
		header("location:FishingPlace.php");
		 
	}
}



?> 