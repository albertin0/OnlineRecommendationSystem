<?php 
echo exec('whoami');
session_start();
$userId = null;
if(isset($_SESSION['userId']))  {
  $userId = $_SESSION['userId'];
  require ("recTableUpdation.php");
  require("recArray2Creation.php");
}
$itemId =  $_GET['itemId'];
$itemGroup = $_GET['itemGroup'];
$itemName =  $_GET['itemName'];
$itemPic = $_GET['itemPic'];
$itemDescription = $_GET['itemDescription'];
$itemPrice = $_GET['itemPrice'];

if(isset($userId))	{
	echo "<br>";
	  $array = $_SESSION['array'];
	  for($j=0;$j<5;$j++) 
	    echo $array[$j][0]." has distance ".$array[$j][1]."<br>";
}
// to store the visits of a user for each item (only when a user has logged in)
if(isset($userId))	{
	require("connect.php");
	mysql_query("INSERT INTO visitedTable VALUES ('','$userId',
				'$itemId','$itemGroup','".time()."')");
	
	mysql_close();
}
// to store the data of a user for each item he buys(only when a user has logged in)
if(isset($userId) && isset($_POST['buybtn']))	{
	require("connect.php");

	mysql_query("INSERT INTO boughtTable VALUES ('','$userId',
				'$itemId','$itemGroup','".time()."')");
	
	mysql_close();
	echo "\n$itemName successfully bought by $userId";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>CSS Free Templates with jQuery Slider</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css_index/images/favicon.ico" />
	<link rel="stylesheet" href="css_index/style2.css" type="text/css" media="all" />
	
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
				<div id="main-slider">
					<div id="slider-holder">
						<ul>
						    <li>
						    	<!--<img src="./itemPic/blackberry_priv.jpg" alt="Slider Image 1" />-->
						    	<img src = <?php print '"./itemPic/'.$itemPic.'" ';?> alt="Slider Image 1" />
						    	<div class="cnt">
						    		<h4><?php echo $itemName; ?></h4>
						    		<h2>Item Group: <?php echo $itemGroup; ?></h2><br>
						    		<h3>Item Description:</h3>
						    		<p><?php echo $itemDescription; ?></p>
						    		<span class="price"><span class="dollar">Rs.</span><?php echo "  ".$itemPrice;
						    		?></span>
						    		<!--<a href="#" class="btn notext" title="Order Now">Order Now</a>-->
						    	</div>
						    		<br><br><br><br><br><br><br><br>
						    	<span class="rating">
						    		<form method = "post">
						    			<label class="r">Rate:</label>
          								<input type="radio" id="under_13" value="1" name="rating">
          								<label for="under_13" class="light">1</label>
          								&nbsp; &nbsp; &nbsp; 

          								<input type="radio" id="over_13" value="2" name="rating">
          								<label for="over_13" class="light">2</label>
          								&nbsp; &nbsp; &nbsp;

          								<input type="radio" id="over_13" value="3" name="rating">
          								<label for="over_13" class="light">3</label>
          								&nbsp; &nbsp; &nbsp; 

          								<input type="radio" id="over_13" value="4" name="rating">
          								<label for="over_13" class="light">4</label>
          								&nbsp; &nbsp; &nbsp; 

          								<input type="radio" id="over_13" value="5" name="rating">
          								<label for="over_13" class="light">5</label>
        								&nbsp; &nbsp; &nbsp; 
        
        								<input type="submit" name="ratebtn" value="RATE IT!" >
        							</form>
        						<h5><?php 
        							if(isset($userId))	{
	        							require("connect.php");
	        							$query = "SELECT * FROM  ratedTable WHERE itemId='$itemId' AND userId='$userId'";
	        							$result = mysql_query($query);
	        							$noOfRows = mysql_num_rows($result);
	        							if(isset($_POST['ratebtn']))	{
	        								$rating = $_POST['rating']*2;
	        								if($noOfRows)
	        									mysql_query("UPDATE ratedTable SET rating = $rating, timeStamp = ".time()." WHERE userId = '$userId' AND itemId = '$itemId'");
	        								else
	        									mysql_query("INSERT INTO ratedTable VALUES ('','$userId',
	        										'$itemId','$itemGroup','$rating','".time()."')");
	        							}

	        							$result = mysql_query($query);
	        							$noOfRows = mysql_num_rows($result);
	        							if($noOfRows)
	        								while($row = mysql_fetch_array($result))	{
	        									$rating = $row['rating']/2;
	        									echo "Previous rating by $userId was ".$rating;
	        								}

	        							/*$rating = null;
	        							if(isset($_POST['ratebtn']))
	        								$rating = $_POST['rating']*20;

	        							if($result & $noOfRows)	{
	        								while($row = mysql_fetch_array($result))
	        									echo "Previous rating ".$row['rating'];
	        								//update
	        								if(!$rating)
	        									mysql_query("UPDATE ratedTable SET rating = $rating WHERE userId = '$userId' AND itemId = '$itemId'");
	        							}
	        							else 	{
	        								//Insert 	
	        								$time = time();
	        								if($rating != null)
	        									mysql_query("INSERT INTO ratedTable VALUES ('','$userId',
	        										'$itemId','$itemGroup','$rating','$time')");
	        							}
										*/
	        							mysql_close();
        							}
        							?>
        						</h5>
        						</span>
        						<br><br><br><br><br><br><br><br>
        						<br><br><br>
        						<span class = "buy">
        							<form method = "post">
						    			<input type="submit" name="buybtn" value="BUY IT!" >
        							</form>
        						</span>
						    		<div class="cl">&nbsp;</div>
						    	
						    </li>
						</ul>
					</div>
				</div>
				<!-- End Slider -->
				<!-- Content -->
				<div id="content">
					<!-- Case -->

					<div class="case">
						<h3>Bestsellers</h3>
						<!-- Products Slider -->
						<div class="products-slider">
							<div class="slider-holder">
								<ul>
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
								    </li>
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

					<div class="case">
						<h3>newest</h3>
						<!-- Row -->
						<div class="row">
							<ul>
							<?php
							    $print = '';
							    require('connect.php');
							    $query = "SELECT * FROM items WHERE itemGroup='".$itemGroup."' ORDER BY itemPrice DESC";
							    $result = mysql_query($query);
							    //echo $query."<br>";
							    //$result = mysql_fetch_assoc($query);
							    //mysql_close();
							    //$numrows = mysql_num_rows($result);
							    //for($i=0; $i < $numrows; $i++)	{
							    while($row = mysql_fetch_array($result))	{
							    	$print .= "<li>";
							    	$print .= "<a href='./navigate.php?itemId=".$row['itemId']."&itemGroup=".$row['itemGroup']."&itemName=".$row['itemName']."&itemPic=".
							    		$row['itemPic']."&itemDescription=".$row['itemDescription'].
							    		"&itemPrice=".$row['itemPrice']."' class = 'product'>";
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
						</div>
						<!-- End Row -->
					</div>
					<!-- End Case -->
				</div>
				<!-- End Content -->
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Main -->
		<div id="footer-push" class="cl">&nbsp;</div>
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
				    	<p>This Project has been designed by Albert Mathews a B.Tech final year student of Computer Science Engineering from Guru Ghasidas University. And it is designed to test and understand the benefits of a Basic Recommendation System for an Online Shopping Website.</p>
				    	<p> It Aims to Recommend Products to Users based on their interests and previous purchase history. </p>
				    </li>
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