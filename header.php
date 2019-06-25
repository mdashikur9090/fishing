<?php 

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$_SESSION["directory"]="http://localhost/fishing/";

if(!isset($_SESSION["isLogedIn"])){
	$_SESSION["isLogedIn"]=false;
}
?>


<!DOCTYPE html>
<html lang="en" class="">
<head>
	
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Fishing</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="<?=$_SESSION["directory"]?>images/favicon.ico" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$_SESSION["directory"]?>images/apple-touch-icon-114x114-precomposed.png">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$_SESSION["directory"]?>images/apple-touch-icon-72x72-precomposed.html">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="<?=$_SESSION["directory"]?>images/apple-touch-icon-57x57-precomposed.png">

	
	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>revolution/css/settings.css">
	<!-- RS5.0 Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>revolution/css/navigation.css">
	
	<!-- Library -->
    <link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>libraries/lib.css">
	
	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/plugins.css">			
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/navigation-menu.css">
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/shortcode.css">
	<link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>style.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	

	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<div class="main-container" >
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="loader-inner ball-clip-rotate">
					<div></div>
				</div>
			</div>
		</div><!-- Loader /- -->

		<!-- Header Section -->
		<header class="container-fluid no-padding header-section header-section2" >
			<div class="container-fluid no-padding menu-block" style="background-color: rgba(21,21,21,0.8);">
				<!-- Container -->
				<div class="container">	
					<!-- nav -->
					<nav class="navbar navbar-default ow-navigation">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="index.php" class="navbar-brand"><img src="<?=$_SESSION["directory"]?>img/2654162149.png" alt="logo" /></a>
						</div>
						<div class="navbar-collapse collapse" id="navbar">
							<ul class="nav navbar-nav">
								<li>
									<a href="<?=$_SESSION["directory"]?>index.php" title="Home" >Home</a>
								</li>
								<li><a href="" title="About me">About</a></li>
								
								
								<?php 
									if(isset($_SESSION["role"]) && ($_SESSION["role"]==1)){
									?>
										<li>
											<a href="<?=$_SESSION["directory"]?>admin/Edit_product.php" title="Product" >Product</a>
										</li>
										<li>
											<a href="<?=$_SESSION["directory"]?>admin/Edit_fishingPlace.php" title="Place" >Place</a>
										</li>
										<li>
											<a href="<?=$_SESSION["directory"]?>admin/AddFishingKit.php" title="Fishing Kit" >Add Kit</a>
										</li>
										<li>
											<a href="<?=$_SESSION["directory"]?>admin/FishingPlace.php" title="FishingPlace">Add place</a>
										</li>
										
										<li class="dropdown">
											<a href="#" title="Pages" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
											<i class="ddl-switch fa fa-angle-down"></i>
											<ul class="dropdown-menu">
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/checkcustomerRequest.php" title="Customer request">Customer request</a>
												</li>	
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/Orders.php" title="Orders">Orders</a>
												</li>
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/place-booking-order-list.php" title="Place Orders">Place Orders</a>
												</li>
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/userslist.php" title="Register User">User List</a>
												</li>
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/fishingResult.php" title="Fishing Resultr">Fishing Result</a>
												</li>
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/addFishingResult.php" title="Add Fishing Resuktr">Add Fishing Result</a>
												</li>
												<li>
													<a href="<?=$_SESSION["directory"]?>admin/topSellingReport.php" title="Top Selling Reports">Reports</a>
												</li>

												

											</ul>
										</li>
								<?php
									}else{ 
								?>
										<li>
											<a href="<?=$_SESSION["directory"]?>customer/product.php" title="product">Product</a> 
										</li>
										<li>
											<a href="<?=$_SESSION["directory"]?>customer/fishingplaceforcustomer.php" title="book place">Book place</a>
										</li>
										<li>
											<a href="<?=$_SESSION["directory"]?>customer/customerRequest.php" title="Customer request">Request </a>
										</li>
										<li>
													<a href="<?=$_SESSION["directory"]?>customer/fishingResult.php" title="Fishing Resultr">Fishing Result</a>
												</li>
										<li class="dropdown">
											<a href="#" title="Pages" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
											<i class="ddl-switch fa fa-angle-down"></i>
											<ul class="dropdown-menu">
												<li>
													<a href="<?=$_SESSION["directory"]?>customer/cart.php" title="Cart">Buy cart</a>
												</li>
												<li>
													<a href="<?=$_SESSION["directory"]?>customer/hirecardCheck.php" title="Hire Cart">Hire Cart</a>
												</li>
												
											</ul>
										</li>	

									<?php } ?>

									<li class="dropdown">
										<?php 
										if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true){
										
										?>

											<a href="#" title="Me" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Me</a>
											<i class="ddl-switch fa fa-angle-down"></i>
											<ul class="dropdown-menu">

												<?php 
													if(isset($_SESSION["role"]) && ($_SESSION["role"]==1)){
												?>
													<li>
														<a href="<?=$_SESSION["directory"]?>admin/profile.php" title="Profile">Profile</a>
													</li>
													<li>
														<a href="<?=$_SESSION["directory"]?>logout.php" title="Login" >Logout</a>
													</li>

												<?php
											
												}else{ 
												?>

													<li>
														<a href="<?=$_SESSION["directory"]?>customer/profile.php" title="Profile">Profile</a>
													</li>
													<li>
														<a href="<?=$_SESSION["directory"]?>customer/orderHistory.php" title="Order History">Order History</a>
													</li>
													<li>
														<a href="<?=$_SESSION["directory"]?>logout.php" title="Login" >Logout</a>
													</li>


												<?php } ?>
											</ul>
												
											<?php
											
											}else{ 
											?>
											<a href="<?=$_SESSION["directory"]?>login.php" title="Login" >Login</a>
											<?php } ?>
									</li>
			
							</ul>
						</div><!--/.nav-collapse -->
						<div id="loginpanel" class="desktop-hide">
							<div class="right" id="toggle">
								<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
								<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
							</div>
						</div>
					</nav><!-- nav /- -->
				</div><!-- Container /- -->
			</div>
		</header><!-- Header Section /- -->
	</div>
	</body>