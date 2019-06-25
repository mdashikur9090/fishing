
<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	include("DbCon.php");
	$con=connection();
	$name="";
	$Pass="";
	$rows="";
	$right="";
	$Email1="";
	$wrong="";
	$_SESSION["right"]="";
	$_SESSION["isLogedIn"]=false;
	if(isset($_POST["Submit"])){
			$email=$_POST["name"];
			$Pass=md5($_POST["pass"]);
			
		$sql="SELECT * FROM `user` WHERE email='$email' AND password='$Pass'";
		$query=mysqli_query($con,"$sql");
		//$rows=mysqli_fetch_array($query);
		$rows=mysqli_num_rows($query);
		$result=$con->query($sql);
		
		if($result->num_rows > 0){
			$_SESSION["right"]="login successfully";
			$_SESSION["isLogedIn"]=true;
			 
			foreach($result as $row){
				$_SESSION["username"]=$row["name"];
				$_SESSION["role"]=$row["role"];
				//echo($_SESSION["Admin"]);exit();
				$Email1=$row["email"];
				$_SESSION["userid"]=$row["ID"];
				$_SESSION["useremail"]=$Email1;
			}
			echo($_SESSION["isLogedIn"])."<br>";
			header('location:index.php');
		}
		
		else{
			$email=$_POST["name"];
			$Pass=md5($_POST["pass"]);
			 
			if(!isset($_SESSION["loginChk"])){
				$_SESSION["loginChk"]=0;
			}
			
			$sql="SELECT * FROM `user` WHERE email='$email'";
			$result=$con->query($sql);
			
			if($result->num_rows>=0){
				foreach($result as $row){
				$Email1=$row["email"];
				$_SESSION["Email"]=$row["email"];
				
				
			}
			
			if($email != $Email1){
					$wrong="Your email is not matched, please register.<br>";
				$_SESSION["wrong"]=$wrong;
				header('location:login.php');
			
				
			}else{
				$wrong="Password is wrong<br>";
					$_SESSION["wrong"]=$wrong;
					header('location:login.php');
					

					}
			$_SESSION["loginChk"]++;
			}
		 
			}
		echo($_SESSION["right"]);
		echo("fe");
		echo($wrong);
		 
	
	}



 


?>
 