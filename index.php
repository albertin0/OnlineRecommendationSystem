<?php 
echo exec('whoami');
session_start();
$userId = null;
if(isset($_SESSION['userId']))  {
  $userId = $_SESSION['userId'];
  require ("recTableUpdation.php");
  require("recArray2Creation.php");
  $phoneRatings = $_SESSION['phone'];
  $tabletRatings = $_SESSION['tablet'];
  $laptopRatings = $_SESSION['laptop'];

  /*$array = implode("<br>",$_SESSION['array']);
  echo "<br>";
  echo $array;*/
}
if(isset($userId))  {
  echo "<br>";
  $array = $_SESSION['array'];
  for($j=0;$j<5;$j++) 
    echo $array[$j][0]." has distance ".$array[$j][1]."<br>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>CSS Free Templates with jQuery Slider</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css_index/images/favicon.ico" />
	<link rel="stylesheet" href="css_index/styleIndex.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="media" />
		<script src="js/png-fix.js" type="text/javascript" charset="utf-8"></script>
	<![endif]-->
	<script src="js_index/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js_index/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js_index/jquery-func.js" type="text/javascript" charset="utf-8"></script>	
</head>
<body>
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header -->
		<div id="top">
			<!-- Shell -->
			<div class="shell">
				<div class="top-nav">
					<ul>
					    <li class="first nobg"><a href="./signup.php" title="Default welcome msg!">SignUp</a></li>
					    <?php
					    if($userId)  {
					    	echo'<li>Logged in as '.$userId.'</li>';
                echo'<li><a href="./destroy.php" title="Logout">Logout</a></li>';
              }
					    else
					    	echo'<li><a href="./login.php" title="Login">Login</a></li>';
					    ?>
					    <!--<li><a href="#" title="My Account">My Account</a></li>
					    <li><a href="#" title="My Wishlist">My Wishlist</a></li>
					    <li class="nobg"><a href="#" class="bag" title="My Bag">My Bag</a></li>-->
					</ul>
				</div>
				<!--<div id="search">
					<form action="" method="post">
						<input type="text" class="field" value="search" title="Quick search..." />
					</form>
				</div>-->
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Top -->
		<!-- Main -->
		<div id="main">
			<!-- Shell -->
			<div class="shell">
				<!-- Header -->
				<div id="header">
					<h1 id="logo"><a href="a" class="notext" title="Shopper Friend">Shopper's Friend</a></h1>
					<div id="navigation">
						<ul>
						    <li><a href="./index.php" class="active" title="Home"><span>Home</span></a></li>
						    <!--<li><a href="#" title="For Girls"><span>For Girls</span></a></li>
						    <li><a href="#" title="Common"><span>Common</span></a></li>-->
						</ul>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Header -->
				<!-- Slider -->
				<!--<div id="main-slider">
					<div id="slider-holder">
						<ul>
						    <li>
						    	<img src="css_index/images/slider-image-1.jpg" alt="Slider Image 1" />
						    	<div class="cnt">
						    		<h4>Vestibulum rhoncus ultrices elementum</h4>
						    		<h2>Suspendisse non sem tellus</h2>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla mattis nisl, sit amet tincidunt.</p>
						    		<span class="price"><span class="dollar">$</span> 1599<span class="sub-text">.99</span></span>
						    		<a href="#" class="btn notext" title="Order Now">Order Now</a>
						    		<div class="cl">&nbsp;</div>
						    	</div>
						    </li>
						    <li>
						    	<img src="css_index/images/slider-image-1.jpg" alt="Slider Image 1" />
						    	<div class="cnt">
						    		<h4>Vestibulum rhoncus ultrices elementum</h4>
						    		<h2>Suspendisse non sem tellus</h2>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla mattis nisl, sit amet tincidunt.</p>
						    		<span class="price"><span class="dollar">$</span> 1599<span class="sub-text">.99</span></span>
						    		<a href="#" class="btn notext" title="Order Now">Order Now</a>
						    		<div class="cl">&nbsp;</div>
						    	</div>
						    </li>
						    <li>
						    	<img src="css_index/images/slider-image-1.jpg" alt="Slider Image 1" />
						    	<div class="cnt">
						    		<h4>Vestibulum rhoncus ultrices elementum</h4>
						    		<h2>Suspendisse non sem tellus</h2>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla mattis nisl, sit amet tincidunt.</p>
						    		<span class="price"><span class="dollar">$</span> 1599<span class="sub-text">.99</span></span>
						    		<a href="#" class="btn notext" title="Order Now">Order Now</a>
						    		<div class="cl">&nbsp;</div>
						    	</div>
						    </li>
						</ul>
					</div>
					<div class="nav">
						<a href="#" title="First Slide">&nbsp;</a>
						<a href="#" title="Second Slide">&nbsp;</a>
						<a href="#" title="Third Slide">&nbsp;</a>
					</div>
				</div>-->
				<!-- End Slider -->
				<!-- Content -->
				<div id="content">

          <div class="case">
            <h3>Bestsellers</h3>
            
            <div class="products-slider">
              <div class="slider-holder">
                <ul>
                    <?php
                  $print = '';
                  require('connect.php');
                  $query = "SELECT * FROM items WHERE 1 ORDER BY itemPrice DESC";
                  $result = mysql_query($query);
                  //echo $query."<br>";
                  //$result = mysql_fetch_assoc($query);
                  //mysql_close();
                  //$numrows = mysql_num_rows($result);
                  //for($i=0; $i < $numrows; $i++)  {
                  while($row = mysql_fetch_array($result))  {
                    $print .= "<li>";
                    $print .= "<a href='./navigate.php?itemId=".$row['itemId'].
                      "&itemGroup=".$row['itemGroup']."&itemName=".$row['itemName']."&itemPic=".
                      $row['itemPic']."&itemDescription=".$row['itemDescription'].
                      "&itemPrice=".$row['itemPrice']."' class= 'product'>";
                    $print .= "<img src='./itemPic/".$row['itemPic']."' />";
                    $print .= "<span class='order model'>".$row['itemName']."</span>";
                    $print .= "<span class='order'>itemId: <span class='number'>"
                          .$row['itemId']."</span></span>";
                    $print .= "<span class='order'><span class='buy-text'>Buy Now</span>
                          <span class='price'><span class='dollar'>Rs.</span>";
                    $print .= $row['itemPrice']."</span></span></a></li>";
                  }
                  mysql_close();
                  echo $print;
              ?>
                    <!--<li>
                      <a class="product" title="Product 9">
                      <img src="css_index/images/product-9.jpg" alt="Product Image 9" />
                      <span class="order model">Model Name</span>
                    <span class="order">catalog number: <span class="number">347</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>14<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                    <li>
                      <a class="product" title="Product 10">
                      <img src="css_index/images/product-10.jpg" alt="Product Image 10" />
                      <span class="order model">Model Name</span>
                    <span class="order">catalog number: <span class="number">537</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>24<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                    <li>
                      <a class="product" title="Product 11">
                      <img src="css_index/images/product-11.jpg" alt="Product Image 11" />
                      <span class="order model">Model Name</span>
                      <span class="order">catalog number: <span class="number">710</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>4<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                    <li>
                      <a class="product" title="Product 12">
                      <img src="css_index/images/product-12.jpg" alt="Product Image 12" />
                      <span class="order model">Model Name</span>
                      <span class="order">catalog number: <span class="number">32</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>7<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                     <li>
                      <a class="product" title="Product 9">
                      <img src="css_index/images/product-9.jpg" alt="Product Image 9" />
                      <span class="order model">Model Name</span>
                    <span class="order">catalog number: <span class="number">347</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>14<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                    <li>
                      <a class="product" title="Product 10">
                      <img src="css_index/images/product-10.jpg" alt="Product Image 10" />
                      <span class="order model">Model Name</span>
                    <span class="order">catalog number: <span class="number">537</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>24<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                    <li>
                      <a class="product" title="Product 11">
                      <img src="css_index/images/product-11.jpg" alt="Product Image 11" />
                      <span class="order model">Model Name</span>
                      <span class="order">catalog number: <span class="number">710</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>4<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>
                    <li>
                      <a class="product" title="Product 12">
                      <img src="css_index/images/product-12.jpg" alt="Product Image 12" />
                      <span class="order model">Model Name</span>
                      <span class="order">catalog number: <span class="number">32</span></span>
                      <span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>7<span class="sub-text">.99</span></span></span>
                    </a>
                    </li>-->
                </ul>
              </div>

              <div class="nav">
                <a href="#" class="prev" title="Previous">Prev</a>
                <a href="#" class="next" title="Next">Next</a>
                <div class="cl">&nbsp;</div>
              </div>
            </div>
            <!-- End Products Slider -->
          </div>
          <!-- End Case -->
					<!-- Case -->
					<div class="case">
						<h3>newest</h3>
						<!-- Row -->
						<div class="row">
							<ul>
                  <?php
                  $print = '';
                  require('connect.php');
                  $query = "SELECT * FROM items WHERE 1 ORDER BY itemPrice DESC";
                  $result = mysql_query($query);
                  //echo $query."<br>";
                  //$result = mysql_fetch_assoc($query);
                  //mysql_close();
                  //$numrows = mysql_num_rows($result);
                  //for($i=0; $i < $numrows; $i++)  {
                  while($row = mysql_fetch_array($result))  {
                    $print .= "<li>";
                    $print .= "<a href='./navigate.php?itemId=".$row['itemId'].
                      "&itemGroup=".$row['itemGroup']."&itemName=".$row['itemName']."&itemPic=".
                      $row['itemPic']."&itemDescription=".$row['itemDescription'].
                      "&itemPrice=".$row['itemPrice']."' class= 'product'>";
                    $print .= "<img src='./itemPic/".$row['itemPic']."' />";
                    $print .= "<span class='order model'>".$row['itemName']."</span>";
                    $print .= "<span class='order'>itemId: <span class='number'>"
                          .$row['itemId']."</span></span>";
                    $print .= "<span class='order'><span class='buy-text'>Buy Now</span>
                          <span class='price'><span class='dollar'>Rs.</span>";
                    $print .= $row['itemPrice']."</span></span></a></li>";
                  }
                  mysql_close();
                  echo $print;
              ?>
							    <!--<li>
									<a href="#" class="product" title="Product 1">
										<img src="css_index/images/product-1.jpg" alt="Product Image 1" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">1925</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>599<span class="sub-text">.99</span></span></span>
									</a>
							    </li>
							    <li>
									<a href="#" class="product" title="Product 2">
										<img src="css_index/images/product-2.jpg" alt="Product Image 2" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">1357</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>1999<span class="sub-text">.99</span></span></span>
									</a>	
							    </li>
							    <li>
									<a href="#" class="product" title="Product 3">
										<img src="css_index/images/product-3.jpg" alt="Product Image 3" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">1264</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>15<span class="sub-text">.99</span></span></span>
									</a>	
							    </li>
							    <li>
									<a href="#" class="product" title="Product 4">
										<img src="css_index/images/product-4.jpg" alt="Product Image 4" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">1111</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>1999<span class="sub-text">.99</span></span></span>
									</a>	
							    </li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						<div class="row last-row">
							<ul>
							    <li>
									<a href="#" class="product" title="Product 5">
										<img src="css_index/images/product-5.jpg" alt="Product Image 5" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">357</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>874<span class="sub-text">.99</span></span></span>
									</a>
							    </li>
							    <li>
									<a href="#" class="product" title="Product 6">
										<img src="css_index/images/product-6.jpg" alt="Product Image 6" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">1926</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>1199<span class="sub-text">.99</span></span></span>
									</a>	
							    </li>
							    <li>
									<a href="#" class="product" title="Product 7">
										<img src="css_index/images/product-7.jpg" alt="Product Image 7" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">1321</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>27<span class="sub-text">.99</span></span></span>
									</a>	
							    </li>
							    <li>
									<a href="#" class="product" title="Product 8">
										<img src="css_index/images/product-8.jpg" alt="Product Image 8" />
										<span class="order model">Model Name</span>
										<span class="order">catalog number: <span class="number">299</span></span>
										<span class="order"><span class="buy-text">Buy Now</span><span class="price"><span class="dollar">$</span>4<span class="sub-text">.99</span></span></span>
									</a>	
							    </li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						
					</div>
				  -->
					
				</div>
				<!-- End Content -->
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Main -->
		
	</div>
	<!-- End Wrapper -->
	<!-- Footer -->
	<div id="footer">
		<!-- Shell -->
		<div class="shell">
			<!-- Cols -->
			<div class="cols">
				<ul>
				    <li class="col">
              <h4>about this Project</h4>
              <p>This Project has been designed by Albert Mathews a B.Tech 
              final year student of Computer Science Engineering from Guru 
              Ghasidas University. And it is designed to test and understand 
              the benefits of a Basic Recommendation System for an Online 
              Shopping Website.</p>
              <p> It Aims to Recommend Products to Users based on their 
              interests and previous purchase history. </p>
            </li>
            <!--<li class="col social">
              <h4>get social</h4>
              <ul>
                  <li><a href="#" class="fb-link" title="Facebook">facebook</a></li>
                  <li><a href="#" class="twitter-link" title="Twitter">twitter</a></li>
                  <li><a href="#" class="behance-link" title="Behance">behance</a></li>
                  <li><a href="#" class="blogger-link" title="Blogger">blogger</a></li>
                  <li><a href="#" class="digg-link" title="Digg">digg</a></li>
              </ul>
            </li>
            <li class="col partners">
              <h4>partners</h4>
              <ul>
                  <li><a href="#" title="Lorem ipsum dolor">Lorem ipsum dolor</a></li>
                  <li><a href="#" title="Cras eu lorem id mauris">Cras eu lorem id mauris</a></li>
                  <li><a href="#" title="Proin et velit ut libero">Proin et velit ut libero</a></li>
                  <li><a href="#" title="Velit esse molestie consequat">Velit esse molestie consequat</a></li>
                  <li><a href="#" title="Vel illum dolore eu">Vel illum dolore eu</a></li>
              </ul>
            </li>
            <li class="col contact">
              <h4>newsletter</h4>
              <p>Etiam consectetur dui dignissim nulla</p>
              <form action="" method="post">
                <div class="field-wrapper">
                  <input type="text" class="field" value="Name" title="Name" />
                </div>
                <div class="field-wrapper">
                  <input type="text" class="field" value="Email" title="Email" />
                </div>
                <input type="submit" value="Submit" class="submit-btn" title="Submit" />
                <div class="cl">&nbsp;</div>
              </form>
            </li>-->
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Cols -->
			<p class="copy">&copy; Designed by Albertino</p>
			<a href="#" class="logo" title="Shopper Friend"><img src="css_index/images/footer-logo.png" alt="Shopper Friend" /></a>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Shell -->
	</div>
	<!-- End Footer -->
</body>
</html>